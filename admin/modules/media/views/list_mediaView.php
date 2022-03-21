<?php
    get_header();
    global $page, $num_page, $start, $total_row;
?>
<div id="main-content-wp" class="list-product-page list-slider">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách media</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả (<span class="count"><?php echo $total_row; ?>)</span></a></li>
                        </ul>
                    </div>
                    <div class="table-responsive">
                            <?php
                                if(isset($list_media)){
                            ?>
                            <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Hình ảnh</span></td>
                                    <td><span class="thead-text">Tên sản phẩm</span></td>
                                    <td><span class="thead-text">Tên file</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $count = 0;
                                    foreach ($list_media as $item) {
                                        $count++;
                                ?>
                                <tr>
                                    <td><span class="tbody-text"><?php echo $count; ?></h3></span>
                                    <td>
                                        <div class="tbody-thumb">
                                            <img src="<?php echo base_url($item['thumb_path']); ?>" alt="">
                                        </div>
                                    </td>
                                    <td><span class="tbody-text"><?php echo $item['product_name']; ?></span></td>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="" title=""><?php echo $item['thumb_path']; ?></a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="<?php echo $item['url_delete']; ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text"><?php echo $item['creator']; ?></span></td>
                                    <td><span class="tbody-text"><?php echo date('d/m/Y',$item['add_date']); ?></span></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <?php
                        echo get_pagging($num_page, $page, "?mod=media&action=list_media");
                    ?>
                </div>  
            </div>
        </div>
    </div>
</div>
<?php
    get_footer();
?>