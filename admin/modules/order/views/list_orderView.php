<?php
get_header();
global $num_page, $page, $result_search_status, $result_search, $start;
?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách đơn hàng</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count">( <?php echo count($list_order); ?> )</span></a> |</li>
                            <li class="publish"><a href="">Đang vận chuyển <span class="count">(
                                        <?php
                                        $count = 0;
                                        foreach ($list_order as $order) {
                                            if ($order['order_status'] == 2) {
                                                $count++;
                                            }
                                        }
                                        echo $count;
                                        ?>
                                        )</span></a> |</li>
                            <li class="pending"><a href="">Chờ duyệt<span class="count">(
                                        <?php
                                        $count = 0;
                                        foreach ($list_order as $order) {
                                            if ($order['order_status'] == 1) {
                                                $count++;
                                            }
                                        }
                                        echo $count;
                                        ?>
                                        )</span></a></li>
                            <li class="pending"><a href="">Đã nhận hàng<span class="count">(
                                        <?php
                                        $count = 0;
                                        foreach ($list_order as $order) {
                                            if ($order['order_status'] == 3) {
                                                $count++;
                                            }
                                        }
                                        echo $count;
                                        ?>
                                        )</span></a></li>
                        </ul>
                        <form method="POST" class="form-s fl-right">
                            <input type="text" name="search" id="s" value="<?php if (!empty($_POST['search'])) echo $_POST['search']; ?>">
                            <input type="submit" name="btn_search" value="Tìm kiếm">
                        </form>
                    </div>
                    <div class="actions">
                        <form method="POST" action="" class="form-actions">
                            <select name="status">
                                <option value="">Trạng thái</option>
                                <option <?php if (!empty($_POST['status']) && $_POST['status'] == 1) echo "selected='selected'"; ?> value="1">Chờ duyệt</option>
                                <option <?php if (!empty($_POST['status']) && $_POST['status'] == 2) echo "selected='selected'"; ?> value="2">Đang vận chuyển</option>
                                <option <?php if (!empty($_POST['status']) && $_POST['status'] == 3) echo "selected='selected'"; ?> value="3">Đã nhận hàng</option>
                            </select>
                            <input type="submit" name="btn_search_status" value="Áp dụng">
                        </form>
                    </div>
                    <?php if (isset($_SESSION['handle_order_success'])) echo "<p class='success'>$_SESSION[handle_order_success]</p>" ?>
                    <div class="table-responsive">
                        <?php
                        if ((!isset($_POST['btn_search']) || empty($_POST['search'])) && (!isset($_POST['btn_search_status']) || empty($_POST['status']))) {
                            if (!empty($list_order)) {
                        ?>
                                <table class="table list-table-wp">
                                    <thead>
                                        <tr>
                                            <td><span class="thead-text">STT</span></td>
                                            <td><span class="thead-text">Mã đơn hàng</span></td>
                                            <td><span class="thead-text">Họ và tên</span></td>
                                            <td><span class="thead-text">Số lượng</span></td>
                                            <td><span class="thead-text">Tổng giá</span></td>
                                            <td><span class="thead-text">Trạng thái</span></td>
                                            <td><span class="thead-text">Thời gian</span></td>
                                            <td><span class="thead-text">Chi tiết</span></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count = $start;
                                        foreach ($list_order as $order) {
                                            $count++;
                                        ?>
                                            <tr>
                                                <td><span class="tbody-text"><?php echo $count; ?></h3></span>
                                                <td><span class="tbody-text"><?php echo "ORDER#" . $order['id']; ?></h3></span>
                                                <td>
                                                    <div class="tb-title fl-left">
                                                        <a href="<?php echo $order['url_update']; ?>" title=""><?php echo $order['name']; ?></a>
                                                    </div>
                                                    <ul class="list-operation fl-right">
                                                        <li><a href="<?php echo $order['url_update']; ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                        </li>
                                                        <li><a href="<?php echo $order['url_delete']; ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td><span class="tbody-text"><?php echo $order['order_qty']; ?></span></td>
                                                <td><span class="tbody-text"><?php echo currency_format($order['total_price']); ?></span>
                                                </td>
                                                <td><span class="tbody-text">
                                                        <?php
                                                        if ($order['order_status'] == 1)
                                                            echo "Chờ duyệt";
                                                        if ($order['order_status'] == 2)
                                                            echo "Đang vận chuyển";
                                                        if ($order['order_status'] == 3)
                                                            echo "Đã nhận hàng";
                                                        ?></span></td>
                                                <td><span class="tbody-text"><?php echo date('d/m/Y', $order['order_date']); ?></span>
                                                </td>
                                                <td><a href="<?php echo $order['url_detail_order']; ?>" title="" class="tbody-text">Chi tiết</a></td>
                                            </tr>
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
                                            <td><span class="thead-text">STT</span></td>
                                            <td><span class="thead-text">Mã sản phẩm</span></td>
                                            <td><span class="thead-text">Hình ảnh</span></td>
                                            <td><span class="thead-text">Tên sản phẩm</span></td>
                                            <td><span class="thead-text">Giá</span></td>
                                            <td><span class="thead-text">Danh mục</span></td>
                                            <td><span class="thead-text">Trạng thái</span></td>
                                            <td><span class="thead-text">Người tạo</span></td>
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
                                                <td><span class="tbody-text"><?php echo $count; ?></h3></span>
                                                <td><span class="tbody-text"><?php echo "ORDER#" . $item['order_id']; ?></h3></span>
                                                <td>
                                                    <div class="tb-title fl-left">
                                                        <a href="<?php echo $item['url_update']; ?>" title=""><?php echo $item['name']; ?></a>
                                                    </div>
                                                    <ul class="list-operation fl-right">
                                                        <li><a href="<?php echo $item['url_update']; ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                        </li>
                                                        <li><a href="<?php echo $item['url_delete']; ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td><span class="tbody-text"><?php echo $item['order_qty']; ?></span></td>
                                                <td><span class="tbody-text"><?php echo currency_format($item['total_price']); ?></span>
                                                </td>
                                                <td><span class="tbody-text">
                                                        <?php
                                                        if ($item['order_status'] == 1)
                                                            echo "Chờ duyệt";
                                                        if ($item['order_status'] == 2)
                                                            echo "Đang vận chuyển";
                                                        if ($item['order_status'] == 3)
                                                            echo "Đã nhận hàng";
                                                        ?></span></td>
                                                <td><span class="tbody-text"><?php echo date('d/m/Y', $item['order_date']); ?></span>
                                                </td>
                                                <td><a href="<?php echo $item['url_detail_order']; ?>" title="" class="tbody-text">Chi tiết</a></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            <?php
                            } else { ?>
                                <p>Không tìm thấy kết quả nào phù hợp với từ khóa<b>"<?php if (!empty($_POST['search'])) echo $_POST['search']; ?>"</b></p>
                        <?php
                            }
                        }
                        ?>
                        <?php
                        if (isset($_POST['btn_search_status']) && !empty($_POST['status'])) {
                            if (!empty($result_search_status)) {
                        ?>
                                <b>Có <?php echo count($result_search_status); ?> kết quả tìm kiếm</b>
                                <table class="table list-table-wp">
                                    <thead>
                                        <tr>
                                            <td><span class="thead-text">STT</span></td>
                                            <td><span class="thead-text">Mã đơn hàng</span></td>
                                            <td><span class="thead-text"></span></td>
                                            <td><span class="thead-text">Số lượng</span></td>
                                            <td><span class="thead-text">Tổng giá</span></td>
                                            <td><span class="thead-text">Trạng thái</span></td>
                                            <td><span class="thead-text">Thời gian</span></td>
                                            <td><span class="thead-text">Chi tiết</span></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count = 0;
                                        foreach ($result_search_status as $status) {
                                            $count++;
                                        ?>
                                            <tr>
                                                <td><span class="tbody-text"><?php echo $count; ?></h3></span>
                                                <td><span class="tbody-text"><?php echo "ORDER#" . $status['id']; ?></h3></span>
                                                <td>
                                                    <ul class="list-operation fl-right">
                                                        <li><a href="<?php echo $status['url_update']; ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                        </li>
                                                        <li><a href="<?php echo $status['url_delete']; ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td><span class="tbody-text"><?php echo $status['order_qty']; ?></span></td>
                                                <td><span class="tbody-text"><?php echo currency_format($status['total_price']); ?></span>
                                                </td>
                                                <td><span class="tbody-text">
                                                        <?php
                                                        if ($status['order_status'] == 1)
                                                            echo "Chờ duyệt";
                                                        if ($status['order_status'] == 2)
                                                            echo "Đang vận chuyển";
                                                        if ($status['order_status'] == 3)
                                                            echo "Đã nhận hàng";
                                                        ?></span></td>
                                                <td><span class="tbody-text"><?php echo date('d/m/Y', $status['order_date']); ?></span>
                                                </td>
                                                <td><a href="<?php echo $status['url_detail_order']; ?>" title="" class="tbody-text">Chi tiết</a></td>
                                            </tr>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <b>Không có kết quả tìm kiếm nào</b>
                                    <?php
                                    }
                                    ?>
                                    </tbody>
                                <?php } ?>
                                </table>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <?php
                    if ((!isset($_POST['btn_search']) || empty($_POST['search'])) && (!isset($_POST['btn_search_status']) || empty($_POST['status']))) {
                        echo get_pagging($num_page, $page, "?mod=order&action=list_order");
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
unset($_SESSION['handle_order_success']);
get_footer();
?>