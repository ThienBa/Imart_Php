<?php
get_header();
global $error, $upload_file, $success;
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form enctype="multipart/form-data" method="POST">
                        <label for="product-name">Tên sản phẩm</label>
                        <input type="text" name="product_name" id="product_name" value="<?php if (!empty($_SESSION['product_name'])) echo $_SESSION['product_name']; ?>">
                        <span class="error"><?php echo form_error('product_name'); ?></span>
                        <label for="product-code">Mã sản phẩm</label>
                        <input type="text" name="product_code" id="product_code" value="<?php if (!empty($_SESSION['product_code'])) echo $_SESSION['product_code']; ?>">
                        <span class="error"><?php echo form_error('product_code'); ?></span>
                        <label for="price">Giá sản phẩm</label>
                        <input type="text" name="product_price" id="price" value="<?php if (!empty($_SESSION['product_price'])) echo $_SESSION['product_price']; ?>">
                        <span class="error"><?php echo form_error('product_price'); ?></span>
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" id="slug" value="<?php if (!empty($_SESSION['slug'])) echo $_SESSION['slug']; ?>">
                        <span class="error"><?php echo form_error('slug'); ?></span>
                        <label for="qty">Số lượng sản phẩm</label>
                        <input type="text" name="qty" id="qty" value="<?php if (!empty($_SESSION['qty'])) echo $_SESSION['qty']; ?>">
                        <span class="error"><?php echo form_error('qty'); ?></span>
                        <label for="creator">Người tạo</label>
                        <input type="text" name="creator" id="creator" value="<?php if (!empty($_SESSION['creator'])) echo $_SESSION['creator']; ?>">
                        <span class="error"><?php echo form_error('creator'); ?></span>
                        <label for="product_desc">Mô tả ngắn</label>
                        <textarea name="product_desc" id="product_desc">
                            <?php if (!empty($_SESSION['product_desc'])) echo $_SESSION['product_desc']; ?>
                        </textarea>
                        <span class="error"><?php echo form_error('product_desc'); ?></span>
                        <label for="content">Chi tiết</label>
                        <textarea name="content" id="content" class="ckeditor">
                            <?php if (!empty($_SESSION['content'])) echo $_SESSION['content']; ?>
                        </textarea>
                        <span class="error"><?php echo form_error('content'); ?></span>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="file" id="file" onchange="ImagesFileAsURL()">
                            <div id="displayImg">

                            </div>
                            <?php
                            if (isset($_POST['btn_add_product'])) {
                                if (empty($error)) {
                                    echo "<img src='{$upload_file}' alt='Đây là ảnh sản phẩm'>";
                                    echo "<a href='{$upload_file}'>Tên file: {$_FILES['file']['name']}</a>";
                                }
                            }
                            ?>
                            <span class="error"><?php echo form_error('file'); ?></span>
                        </div>
                        <label>Danh mục sản phẩm</label>
                        <select name="product_cat">
                            <option value="">-- Chọn danh mục --</option>
                            <?php foreach ($product_cat as $item) {
                            ?>
                                <option <?php if (!empty($_SESSION['product_cat']) && $_SESSION['product_cat'] == $item['cat_id']) echo "selected" ?> value="<?= $item['cat_id'] ?>">
                                    <?php if ($item['parent_id'] == 1) echo $item['cat_name'];
                                    else echo "--" . $item['cat_name']; ?>
                                </option>
                            <?php
                            } ?>
                        </select>
                        <span class="error"><?php echo form_error('product_cat'); ?></span>
                        <label>Trạng thái</label>
                        <select name="status">
                            <option value="">-- Chọn danh mục --</option>
                            <option <?php if (!empty($_SESSION['status']) && $_SESSION['status'] == 1) echo "selected"; ?> value="1">Chờ duyệt</option>
                            <option <?php if (!empty($_SESSION['status']) && $_SESSION['status'] == 2) echo "selected"; ?> value="2">Đã đăng</option>
                        </select>
                        <span class="error"><?php echo form_error('status'); ?></span>
                        <label>Danh mục con của sản phẩm</label>
                        <select name="child_id">
                            <option value="">-- Chọn danh mục con --</option>
                            <option <?php if (!empty($_SESSION['child_id']) && $_SESSION['child_id'] == 1) echo "selected"; ?> value="1">iPhone</option>
                            <option <?php if (!empty($_SESSION['child_id']) && $_SESSION['child_id'] == 2) echo "selected"; ?> value="2">Samsung</option>
                            <option <?php if (!empty($_SESSION['child_id']) && $_SESSION['child_id'] == 3) echo "selected"; ?> value="3">Oppo</option>
                            <option <?php if (!empty($_SESSION['child_id']) && $_SESSION['child_id'] == 4) echo "selected"; ?> value="4">Xiaomi</option>
                            <option <?php if (!empty($_SESSION['child_id']) && $_SESSION['child_id'] == 5) echo "selected"; ?> value="5">Macbook</option>
                            <option <?php if (!empty($_SESSION['child_id']) && $_SESSION['child_id'] == 6) echo "selected"; ?> value="6">Asus</option>
                            <option <?php if (!empty($_SESSION['child_id']) && $_SESSION['child_id'] == 7) echo "selected"; ?> value="7">Acer</option>
                            <option <?php if (!empty($_SESSION['child_id']) && $_SESSION['child_id'] == 8) echo "selected"; ?> value="8">Msi</option>
                        </select>
                        <span class="error"><?php echo form_error('child_id'); ?></span>
                        <button type="submit" name="btn_add_product" id="btn_add_product">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>