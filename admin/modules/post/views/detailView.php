<?php
get_header();
?>
<?php
global $start, $total_row, $result_search, $num_page, $page;
?>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách bài viết</h3>
                    <a href="?mod=post&action=add_post" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count">(<?php echo $total_row; ?>)</span></a></li>
                        </ul>
                        <form method="POST" class="form-s fl-right">
                            <input type="text" name="search" id="search" value="<?php if (!empty($_POST['search'])) echo $_POST['search']; ?>">
                            <input type="submit" name="btn_search" value="Tìm kiếm">
                        </form>
                    </div>
                    <?php if (isset($_SESSION['handle_post_success'])) echo "<p class='success'>$_SESSION[handle_post_success]</p>" ?>
                    <div class="table-responsive">
                        <?php
                        if (!isset($_POST['btn_search']) || empty($_POST['search'])) {
                            if (!empty($list_post)) {
                        ?>
                                <table class="table list-table-wp">
                                    <thead>
                                        <tr>
                                            <td><span class="thead-text">STT</span></td>
                                            <td><span class="thead-text">Tiêu đề</span></td>
                                            <td><span class="thead-text">Danh mục</span></td>
                                            <td><span class="thead-text">Người tạo</span></td>
                                            <td><span class="thead-text">Thời gian</span></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count = $start;
                                        foreach ($list_post as $item) {
                                            $count++;
                                        ?>
                                            <tr>
                                                <td><span class="tbody-text"><?php echo $count; ?></h3></span>
                                                <td class="clearfix">
                                                    <div class="tb-title fl-left">
                                                        <a href="<?php echo $item['url_update']; ?>" title=""><?php echo $item['post_title']; ?></a>
                                                    </div>
                                                    <ul class="list-operation fl-right">
                                                        <li><a href="<?php echo $item['url_update']; ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                        <li><a href="<?php echo $item['url_delete']; ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </td>
                                                <td><span class="tbody-text"><?php echo $item['cat_name']; ?></span></td>
                                                <td><span class="tbody-text"><?php echo $item['creator']; ?></span></td>
                                                <td><span class="tbody-text"><?php echo date('d/m/Y', $item['create_date_post']); ?></span></td>
                                            </tr>
                                        <?php }
                                        ?>
                                    </tbody>
                                </table>
                        <?php
                            }
                        }
                        ?>
                        <?php
                        if (isset($_POST['btn_search']) && !empty($_POST['search'])) {
                            if (!empty($result_search)) {
                        ?>
                                <p>Có <?php echo count($result_search); ?> kết quả phù hợp với từ khóa <b>"<?php if (!empty($_POST['search'])) echo $_POST['search']; ?>"</b></p>
                                <table class="table list-table-wp">
                                    <thead>
                                        <tr>
                                            <td><span class="thead-text">STT</span></td>
                                            <td><span class="thead-text">Tiêu đề</span></td>
                                            <td><span class="thead-text">Danh mục</span></td>
                                            <td><span class="thead-text">Người tạo</span></td>
                                            <td><span class="thead-text">Thời gian</span></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count = 0;
                                        foreach ($result_search as $post) {
                                            $count++;
                                        ?>
                                            <tr>
                                                <td><span class="tbody-text"><?php echo $count; ?></h3></span>
                                                <td class="clearfix">
                                                    <div class="tb-title fl-left">
                                                        <a href="<?php echo $post['url_update']; ?>" title=""><?php echo $post['post_title']; ?></a>
                                                    </div>
                                                    <ul class="list-operation fl-right">
                                                        <li><a href="<?php echo $post['url_update']; ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                        <li><a href="<?php echo $post['url_delete']; ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </td>
                                                <td><span class="tbody-text"><?php echo $post['cat_name']; ?></span></td>
                                                <td><span class="tbody-text"><?php echo $post['creator']; ?></span></td>
                                                <td><span class="tbody-text"><?php echo date('d/m/Y', $post['create_date_post']); ?></span></td>
                                            </tr>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <p>Không tìm thấy kết quả nào phù hợp với từ khóa <b>"<?php if (!empty($_POST['search'])) echo $_POST['search']; ?>"</b></p>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            <?php } ?>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <?php
                    if (!isset($_POST['btn_search']) || empty($_POST['search'])) {
                        echo get_pagging($num_page, $page, "?mod=post&action=detail");
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
unset($_SESSION['handle_post_success']);
get_footer();
?>