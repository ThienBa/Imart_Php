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
                    <h3 id="index" class="fl-left">THÊM DANH MỤC</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <?php if (isset($success['add_cat'])) echo "<p class='success'>$success[add_cat]</p>" ?>
                <div class="section-detail">
                    <form method="POST">
                        <label for="cat_name">Tên danh mục</label>
                        <input type="text" name="cat_name" id="cat_name" value="<?php if (!empty($_SESSION['cat_name'])) echo $_SESSION['cat_name']; ?>">
                        <span class="error"><?php echo form_error('cat_name'); ?></span>
                        <label for="creator_cat">Người tạo</label>
                        <input type="text" name="creator_cat" id="creator_cat" value="<?php if (!empty($_SESSION['creator_cat'])) echo $_SESSION['creator_cat']; ?>">
                        <span class="error"><?php echo form_error('creator_cat'); ?></span>
                        <label>Danh mục sản phẩm</label>
                        <select name="parent_id">
                            <option value="">-- Cấp bậc danh mục --</option>
                            <option <?php if (!empty($_SESSION['parent_id']) && $_SESSION['parent_id'] == 1) echo "selected"; ?> value="1">Cấp bậc 1</option>
                            <option <?php if (!empty($_SESSION['parent_id']) && $_SESSION['parent_id'] == 2)  echo "selected"; ?> value="2">Cấp bậc 2</option>
                        </select>
                        <span class="error"><?php echo form_error('parent_id'); ?></span>
                        <label>Trạng thái</label>
                        <select name="cat_status">
                            <option value="">-- Chọn danh mục --</option>
                            <option <?php if (!empty($_SESSION['cat_name']) && $_SESSION['cat_name'] == 1) echo "selected"; ?> value="1">Chờ duyệt</option>
                            <option <?php if (!empty($_SESSION['cat_name']) && $_SESSION['cat_name'] == 2) echo "selected"; ?> value="2">Đã đăng</option>
                        </select>
                        <span class="error"><?php echo form_error('cat_status'); ?></span>
                        <button type="submit" name="btn_add_product_cat" id="btn_add_product_cat">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>