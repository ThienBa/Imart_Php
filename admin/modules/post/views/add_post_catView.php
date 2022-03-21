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
                <div class="section-detail">
                    <form enctype="multipart/form-data" method="POST">
                        <label for="cat_name">Tên danh mục</label>
                        <input type="text" name="cat_name" id="cat_name" value="<?php if (!empty($_SESSION['cat_name'])) echo $_SESSION['cat_name']; ?>">
                        <span class="error"><?php echo form_error('cat_name') ?></span>
                        <label for="creator_cat">Người tạo</label>
                        <input type="text" name="creator_cat" id="creator_cat" value="<?php if (!empty($_SESSION['creator_cat'])) echo $_SESSION['creator_cat']; ?>">
                        <label for="parent_id">Cấp bậc danh mục</label>
                        <select name="parent_id">
                            <option value="">---- Chọn ----</option>
                            <option <?php if (isset($_SESSION['parent_id']) && $_SESSION['parent_id'] == 0) echo "selected"; ?> value="0"> Cấp bậc 0 </option>
                            <option <?php if (isset($_SESSION['parent_id']) && $_SESSION['parent_id'] == 1) echo "selected"; ?> value="1"> Cấp bậc 1 </option>
                        </select>
                        <span class="error"><?php echo form_error('parent_id') ?></span>
                        <button type="submit" name="btn_add_post_cat" id="btn_add_post_cat">Cập
                            nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>