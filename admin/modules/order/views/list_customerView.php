<?php
get_header();
global $num_page, $start, $page, $result_search;
?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách khách hàng</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count">(<?php echo count($list_customer); ?>)</span></a></li>
                        </ul>
                        <form method="POST" class="form-s fl-right">
                            <input type="text" name="search" id="search" value="<?php if (!empty($_POST['search']) && ($_POST['btn_search'])) echo $_POST['search']; ?>">
                            <input type="submit" name="btn_search" value="Tìm kiếm">
                        </form>
                    </div>
                    <?php if (isset($_SESSION['handle_customer_success'])) echo "<p class='success'>$_SESSION[handle_customer_success]</p>" ?>
                    <div class="table-responsive">
                        <?php
                        if ((!isset($_POST['btn_search']) || empty($_POST['search'])) && (!isset($_POST['btn_search_status']) || empty($_POST['status']))) {
                            if (!empty($list_customer)) {
                        ?>
                                <table class="table list-table-wp">
                                    <thead>
                                        <tr>
                                            <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                            <td><span class="thead-text">STT</span></td>
                                            <td><span class="thead-text">Họ và tên</span></td>
                                            <td><span class="thead-text">Số điện thoại</span></td>
                                            <td><span class="thead-text">Email</span></td>
                                            <td><span class="thead-text">Địa chỉ</span></td>
                                            <td><span class="thead-text">Đơn hàng</span></td>
                                            <td><span class="thead-text">Thời gian</span></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count = $start;
                                        foreach ($list_customer as $customer) {
                                            $count++;
                                        ?>
                                            <tr>
                                                <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                                <td><span class="tbody-text"><?php echo $count; ?></h3></span>
                                                <td>
                                                    <div class="tb-title fl-left">
                                                        <a href="<?php echo $customer['url_update']; ?>" title=""><?php echo $customer['name']; ?></a>
                                                    </div>
                                                    <ul class="list-operation fl-right">
                                                        <li><a href="<?php echo $customer['url_update']; ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                        </li>
                                                        <!-- <li><a href="<?php echo $customer['url_delete']; ?>" title="Xóa"
                                                    class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </li> -->
                                                    </ul>
                                                </td>
                                                <td><span class="tbody-text"><?php echo $customer['phone_number']; ?></span></td>
                                                <td><span class="tbody-text"><?php echo $customer['email']; ?></span></td>
                                                <td><span class="tbody-text"><?php echo $customer['address']; ?></span></td>
                                                <td><span class="tbody-text"><?php echo $customer['order_id']; ?></span></td>
                                                <td><span class="tbody-text"><?php echo date('d/m/Y', $customer['date_order']); ?></span>
                                                </td>
                                            </tr>
                                    </tbody>
                                <?php } ?>
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
                                <p>Có <?php echo count($result_search); ?> kết quả phù hợp với từ khóa
                                    <b>"<?php if (!empty($_POST['search'])) echo $_POST['search']; ?>"</b>
                                </p>
                                <table class="table list-table-wp">
                                    <thead>
                                        <tr>
                                            <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                            <td><span class="thead-text">STT</span></td>
                                            <td><span class="thead-text">Họ và tên</span></td>
                                            <td><span class="thead-text">Số điện thoại</span></td>
                                            <td><span class="thead-text">Email</span></td>
                                            <td><span class="thead-text">Địa chỉ</span></td>
                                            <td><span class="thead-text">Đơn hàng</span></td>
                                            <td><span class="thead-text">Thời gian</span></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count = 0;
                                        foreach ($result_search as $item) {
                                            $count++;
                                        ?>
                                            <tr>
                                                <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                                <td><span class="tbody-text"><?php echo $count; ?></h3></span>
                                                <td>
                                                    <div class="tb-title fl-left">
                                                        <a href="<?php echo $item['url_update']; ?>" title=""><?php echo $item['name']; ?></a>
                                                    </div>
                                                    <ul class="list-operation fl-right">
                                                        <li><a href="<?php echo $item['url_update']; ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                        <li><a href="<?php echo $item['url_delete']; ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td><span class="tbody-text"><?php echo $item['phone_number']; ?></span></td>
                                                <td><span class="tbody-text"><?php echo $item['email']; ?></span></td>
                                                <td><span class="tbody-text"><?php echo $item['address']; ?></span></td>
                                                <td><span class="tbody-text"><?php echo $item['order_id']; ?></span></td>
                                                <td><span class="tbody-text"><?php echo date('d/m/Y', $item['date_order']); ?></span>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            <?php
                            } else { ?>
                                <p>Không tìm thấy kết quả nào phù hợp với từ
                                    khóa<b>"<?php if (!empty($_POST['search'])) echo $_POST['search']; ?>"</b></p>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <?php
                    if ((!isset($_POST['btn_search']) || empty($_POST['search'])) && (!isset($_POST['btn_search_status']) || empty($_POST['status']))) {
                        echo get_pagging($num_page, $page, "?mod=order&action=list_customer");
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
unset($_SESSION['handle_customer_success']);
get_footer();
?>