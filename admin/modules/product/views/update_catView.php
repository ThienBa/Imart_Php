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
                    <h3 id="index" class="fl-left">CHỈNH SỬA DANH MỤC</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <?php if(isset($success['update_cat'])) echo "<p class='success'>$success[update_cat]</p>" ?>
                <div class="section-detail">
                    <form method="POST">
                        <label for="cat_name">Tên danh mục</label>
                        <input type="text" name="cat_name" id="cat_name" value="<?php if(!empty($cat)) echo $cat['cat_name']; ?>">
                        <span class="error"><?php echo form_error('cat_name'); ?></span>
                        <label for="editor_cat">Người chỉnh sửa</label>
                        <input type="text" name="editor_cat" id="editor_cat">
                        <span class="error"><?php echo form_error('editor_cat'); ?></span>
                        <label>Danh mục sản phẩm</label>
                        <select name="parent_id">
                            <option value="">-- Cấp bậc danh mục --</option>
                            <option <?php if(!empty($cat) && $cat['parent_id'] == 1) echo "selected='selected'"?> value="1">Cấp bậc 1</option>
                            <option <?php if(!empty($cat) && $cat['parent_id'] == 2) echo "selected='selected'"?> value="2">Cấp bậc 2</option>
                        </select>
                        <span class="error"><?php echo form_error('parent_id'); ?></span>
                        <label>Trạng thái</label>
                        <select name="cat_status">
                            <option value="">-- Chọn danh mục --</option>
                            <option <?php if(!empty($cat) && $cat['cat_status'] == 1) echo "selected='selected'"?> value="1">Chờ duyệt</option>
                            <option <?php if(!empty($cat) && $cat['cat_status'] == 2) echo "selected='selected'"?> value="2">Đã đăng</option>
                        </select>
                        <span class="error"><?php echo form_error('cat_status'); ?></span>
                        <button type="submit" name="btn_update_product_cat" id="btn_update_product_cat">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    get_footer();
?>      