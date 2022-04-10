<?php
    get_header();
    global $error, $success;
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Chỉnh sửa sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <?php if(isset($success['update_product'])) echo "<p class='success'>$success[update_product]</p>" ?>
                <div class="section-detail">
                    <form enctype="multipart/form-data" method="POST">
                        <label for="product-name">Tên sản phẩm</label>
                        <input type="text" name="product_name" id="product_name" value="<?php echo $get_product['product_name']; ?>">
                        <span class="error"><?php echo form_error('product_name'); ?></span>
                        <label for="product-code">Mã sản phẩm</label>
                        <input type="text" name="product_code" id="product_code" value="<?php echo $get_product['product_code']; ?>">
                        <span class="error"><?php echo form_error('product_code'); ?></span>
                        <label for="price">Giá sản phẩm</label>
                        <input type="text" name="product_price" id="price" value="<?php echo $get_product['product_price']; ?>">
                        <span class="error"><?php echo form_error('product_price'); ?></span>
                        <label for="old_price">Giá giá cũ của sản phẩm</label>
                        <input type="text" name="old_price" id="old_price" value="<?php echo $get_product['old_price']; ?>">
                        <span class="error"><?php echo form_error('product_price'); ?></span>
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" id="slug" value="<?php echo $get_product['slug']; ?>">
                        <span class="error"><?php echo form_error('slug'); ?></span>
                        <label for="qty">Số lượng sản phẩm</label>
                        <input type="text" name="qty" id="qty" value="<?php echo $get_product['qty']; ?>">
                        <span class="error"><?php echo form_error('qty'); ?></span>
                        <label for="editor">Người chỉnh sửa</label>
                        <input type="text" name="editor" id="editor">
                        <label for="product_desc">Mô tả ngắn</label>
                        <textarea name="product_desc" id="product_desc"><?php echo $get_product['product_desc']; ?></textarea>
                        <span class="error"><?php echo form_error('product_desc'); ?></span>
                        <label for="content">Chi tiết</label>
                        <textarea name="content" id="content" class="ckeditor"><?php echo $get_product['content']; ?></textarea>
                        <span class="error"><?php echo form_error('content'); ?></span>
                        <label>Danh mục sản phẩm</label>
                        <select name="product_cat">
                            <option value="">-- Chọn danh mục --</option>
                            <option <?php if($get_product['cat_id'] == 1) echo "selected = 'selected'"?> value="1">Diện thoại</option>
                            <option <?php if($get_product['cat_id'] == 2) echo "selected = 'selected'"?> value="2">Laptop</option>
                        </select>
                        <span class="error"><?php echo form_error('product_cat'); ?></span>
                        <label>Trạng thái hiện tại</label>
                        <select name="status">
                            <option value="">-- Chọn danh mục --</option>
                            <option <?php if($get_product['product_status'] == 1) echo "selected = 'selected'"?> value="1">Chờ duyệt</option>
                            <option <?php if($get_product['product_status'] == 2) echo "selected = 'selected'"?> value="2">Đã đăng</option>
                        </select>
                        <span class="error"><?php echo form_error('status'); ?></span>
                        <select name="child_id">
                            <option value="">-- Chọn danh mục con --</option>
                            <option <?php if($get_product['child_id'] == 1) echo "selected = 'selected'"?> value="1">iPhone</option>
                            <option <?php if($get_product['child_id'] == 2) echo "selected = 'selected'"?>  value="2">Samsung</option>
                            <option <?php if($get_product['child_id'] == 3) echo "selected = 'selected'"?>  value="3">Oppo</option>
                            <option <?php if($get_product['child_id'] == 4) echo "selected = 'selected'"?>  value="4">Xiaomi</option>
                            <option <?php if($get_product['child_id'] == 5) echo "selected = 'selected'"?>  value="5">Macbook</option>
                            <option <?php if($get_product['child_id'] == 6) echo "selected = 'selected'"?>  value="6">Asus</option>
                            <option <?php if($get_product['child_id'] == 7) echo "selected = 'selected'"?>  value="7">Acer</option>
                            <option <?php if($get_product['child_id'] == 8) echo "selected = 'selected'"?>  value="8">Msi</option>
                        </select>
                        <span class="error"><?php echo form_error('child_id'); ?></span>
                        <button type="submit" name="btn_add_product" id="btn_add_product">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    get_footer();
?>      