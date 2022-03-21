<?php
get_header();
?>
<div id="main-content-wp" class="list-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách danh mục</h3>
                    <a href="?mod=product&action=add_cat" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <?php if (isset($_SESSION['handle_product_cat_success'])) echo "<p class='success'>$_SESSION[handle_product_cat_success]</p>" ?>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="table-responsive">
                        <?php if (isset($product_cat)) { ?>
                            <table class="table list-table-wp">
                                <thead>
                                    <tr>
                                        <td><span class="thead-text">STT</span></td>
                                        <td><span class="thead-text">Tiêu đề</span></td>
                                        <td><span class="thead-text">Cấp bật</span></td>
                                        <td><span class="thead-text">Trạng thái</span></td>
                                        <td><span class="thead-text">Người tạo</span></td>
                                        <td><span class="thead-text">Thời gian</span></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 0;
                                    foreach ($product_cat as $item) {
                                        $count++;
                                    ?>
                                        <tr>
                                            <td><span class="tbody-text"><?php echo $count; ?></h3></span>
                                            <td class="clearfix">
                                                <div class="tb-title fl-left">
                                                    <a href="<?php echo $item['url_update_cat']; ?>" title=""><?php echo $item['cat_name']; ?></a>
                                                </div>
                                                <ul class="list-operation fl-right">
                                                    <li><a href="<?php echo $item['url_update_cat']; ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                    <li><a href="<?php echo $item['url_delete_cat']; ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </td>
                                            <td><span class="tbody-text"><?php echo $item['parent_id']; ?></span></td>
                                            <td><span class="tbody-text"><?php if ($item['cat_status'] == 1) {
                                                                                echo "Chờ duyệt";
                                                                            } else {
                                                                                echo "Hoạt động";
                                                                            } ?></span></td>
                                            <td><span class="tbody-text"><?php echo $item['creator_cat']; ?></span></td>
                                            <td><span class="tbody-text"><?php echo date('d/m/Y', $item['create_date']); ?></span></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
unset($_SESSION['handle_product_cat_success']);
get_footer();
?>