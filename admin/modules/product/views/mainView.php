<?php
get_header();
global $num_page, $page, $start, $list_full_product, $result_search, $result_search_status;
?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách sản phẩm</h3>
                    <a href="?mod=product&action=add_product" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count">( <?php echo count($list_full_product); ?> )</span></a> |</li>
                            <li class="publish"><a href="">Đã đăng <span class="count">(
                                        <?php
                                        $count = 0;
                                        foreach ($list_full_product as $product) {
                                            if ($product['product_status'] == 2) {
                                                $count++;
                                            }
                                        }
                                        echo $count;
                                        ?>
                                        )</span></a> |</li>
                            <li class="pending"><a href="">Chờ xét duyệt<span class="count">(
                                        <?php
                                        $count = 0;
                                        foreach ($list_full_product as $product) {
                                            if ($product['product_status'] == 1) {
                                                $count++;
                                            }
                                        }
                                        echo $count;
                                        ?>
                                        )</span></a></li>
                        </ul>
                        <form method="POST" class="form-s fl-right">
                            <input type="text" name="search" id="search" value="<?php if (!empty($_POST['search'])) echo $_POST['search']; ?>">
                            <input type="submit" name="btn_search" value="Tìm kiếm">
                        </form>
                    </div>
                    <div class="actions">
                        <form method="POST" action="" class="form-actions">
                            <select name="status">
                                <option value="">Trạng thái</option>
                                <option <?php if (!empty($_POST['status']) && $_POST['status'] == 1) echo "selected='selected'"; ?> value="1">Chờ duyệt</option>
                                <option <?php if (!empty($_POST['status']) && $_POST['status'] == 2) echo "selected='selected'"; ?> value="2">Đã đăng</option>
                            </select>
                            <input type="submit" name="btn_search_status" value="Áp dụng">
                        </form>
                    </div>
                    <?php if (isset($_SESSION['handle_product_success'])) echo "<p class='success'>$_SESSION[handle_product_success]</p>" ?>
                    <div class="table-responsive">
                        <?php
                        if (isset($list_product)) {
                            if ((!isset($_POST['btn_search']) || empty($_POST['search'])) && (!isset($_POST['btn_search_status']) || empty($_POST['status']))) {
                        ?>
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
                                        $count = $start;
                                        foreach ($list_product as $product) {
                                            $count++;
                                        ?>
                                            <tr>
                                                <td><span class="tbody-text"><?php echo $count; ?></h3></span>
                                                <td><span class="tbody-text"><?php echo $product['product_code']; ?></h3></span>
                                                <td>
                                                    <div class="tbody-thumb">
                                                        <img src="<?php echo $product['product_thumb']; ?>" alt="">
                                                    </div>
                                                </td>
                                                <td class="clearfix">
                                                    <div class="tb-title fl-left">
                                                        <a href="<?php echo $product['url_update'] ?>" title=""><?php echo $product['product_name']; ?></a>
                                                    </div>
                                                    <ul class="list-operation fl-right">
                                                        <li><a href="<?php echo $product['url_update'] ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                        </li>
                                                        <li><a href="<?php echo $product['url_delete'] ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td><span class="tbody-text"><?php echo currency_format($product['product_price']); ?></span>
                                                </td>
                                                <td><span class="tbody-text"><?php echo $product['cat_name']; ?></span></td>
                                                <td><span class="tbody-text"><?php if ($product['product_status'] == 1) {
                                                                                    echo "Chờ duyệt";
                                                                                } else {
                                                                                    echo "Đã đăng";
                                                                                } ?></span>
                                                </td>
                                                <td><span class="tbody-text"><?php echo $product['creator']; ?></span></td>
                                                <td><span class="tbody-text"><?php echo date('d/m/Y', $product['add_date']); ?></span>
                                                </td>
                                            </tr>
                                        <?php
                                        }
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
                                                <td><span class="tbody-text"><?php echo $item['product_code']; ?></h3></span>
                                                <td>
                                                    <div class="tbody-thumb">
                                                        <img src="<?php echo $item['product_thumb']; ?>" alt="">
                                                    </div>
                                                </td>
                                                <td class="clearfix">
                                                    <div class="tb-title fl-left">
                                                        <a href="<?php echo $item['url_update'] ?>" title=""><?php echo $item['product_name']; ?></a>
                                                    </div>
                                                    <ul class="list-operation fl-right">
                                                        <li><a href="<?php echo $item['url_update'] ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                        </li>
                                                        <li><a href="<?php echo $item['url_delete'] ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td><span class="tbody-text"><?php echo currency_format($item['product_price']); ?></span>
                                                </td>
                                                <td><span class="tbody-text"><?php echo $item['cat_name']; ?></span></td>
                                                <td><span class="tbody-text"><?php if ($item['product_status'] == 1) {
                                                                                    echo "Chờ duyệt";
                                                                                } else {
                                                                                    echo "Đã đăng";
                                                                                } ?></span>
                                                </td>
                                                <td><span class="tbody-text"><?php echo $item['creator']; ?></span></td>
                                                <td><span class="tbody-text"><?php echo date('d/m/Y', $item['add_date']); ?></span>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            <?php
                            } else { ?>
                                <p>Không tìm thấy kết quả nào phù hợp với từ khóa
                                    <b>"<?php if (!empty($_POST['search'])) echo $_POST['search']; ?>"</b>
                                </p>
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
                                        foreach ($result_search_status as $status) {
                                            $count++;
                                        ?>
                                            <tr>
                                                <td><span class="tbody-text"><?php echo $count; ?></h3></span>
                                                <td><span class="tbody-text"><?php echo $status['product_code']; ?></h3></span>
                                                <td>
                                                    <div class="tbody-thumb">
                                                        <img src="<?php echo $status['product_thumb']; ?>" alt="">
                                                    </div>
                                                </td>
                                                <td class="clearfix">
                                                    <div class="tb-title fl-left">
                                                        <a href="<?php echo $status['url_update'] ?>" title=""><?php echo $status['product_name']; ?></a>
                                                    </div>
                                                    <ul class="list-operation fl-right">
                                                        <li><a href="<?php echo $status['url_update'] ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                        </li>
                                                        <li><a href="<?php echo $status['url_delete'] ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td><span class="tbody-text"><?php echo currency_format($status['product_price']); ?></span>
                                                </td>
                                                <td><span class="tbody-text"><?php echo $status['cat_name']; ?></span></td>
                                                <td><span class="tbody-text"><?php if ($status['product_status'] == 1) {
                                                                                    echo "Chờ duyệt";
                                                                                } else {
                                                                                    echo "Đã đăng";
                                                                                } ?></span>
                                                </td>
                                                <td><span class="tbody-text"><?php echo $status['creator']; ?></span></td>
                                                <td><span class="tbody-text"><?php echo date('d/m/Y', $status['add_date']); ?></span>
                                                </td>
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
                                </table>
                            <?php } ?>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <?php
                    if ((!isset($_POST['btn_search']) || empty($_POST['search'])) && (!isset($_POST['btn_search_status']) || empty($_POST['status']))) {
                        echo get_pagging($num_page, $page, "?mod=product&action=main");
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
unset($_SESSION['handle_product_success']);
get_footer();
?>