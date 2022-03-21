<?php
get_header();
global $num_page, $page, $start;
?>
<div id="main-content-wp" class="list-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách danh mục</h3>
                    <a href="?mod=post&action=add_post_cat" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <?php if (isset($_SESSION['handle_post_cat_success'])) echo "<p class='success'>$_SESSION[handle_post_cat_success]</p>" ?>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="table-responsive">
                        <?php if (!empty($list_cat)) { ?>
                            <table class="table list-table-wp">
                                <thead>
                                    <tr>
                                        <td><span class="thead-text">STT</span></td>
                                        <td><span class="thead-text">Tiêu đề</span></td>
                                        <td><span class="thead-text">Cấp bật</span></td>
                                        <td><span class="thead-text">Người tạo</span></td>
                                        <td><span class="thead-text">Thời gian</span></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = $start;
                                    foreach ($list_cat as $item) {
                                        $count++; ?>
                                        <tr>
                                            <td><span class="tbody-text"><?php echo $count ?></h3></span>
                                            <td class="clearfix">
                                                <div class="tb-title fl-left">
                                                    <a href="<?php echo $item['url_update']; ?>" title="">
                                                        <?php
                                                        if ($item['parent_id'] == 1)
                                                            echo '--' . $item['cat_name'];
                                                        else
                                                            echo $item['cat_name'];
                                                        ?></a>
                                                </div>
                                                <ul class="list-operation fl-right">
                                                    <li><a href="<?php echo $item['url_update']; ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                    <li><a href="<?php echo $item['url_delete']; ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </td>
                                            <td><span class="tbody-text"><?php echo $item['parent_id'];  ?></span></td>
                                            <td><span class="tbody-text"><?php echo $item['creator_cat']; ?></span></td>
                                            <td><span class="tbody-text"><?php echo date('d/m/Y', $item['create_date_cat']); ?></span></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <!-- <?php echo get_pagging($num_page, $page, "?mod=post&action=category") ?> -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php
unset($_SESSION['handle_post_cat_success']);
get_footer();
?>