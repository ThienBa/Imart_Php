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
                <div class="section-detail">
                    <form method="POST">
                        <?php if(isset($success['update_post_cat'])) echo "<p class='success'>$success[update_post_cat]</p>" ?>
                        <label for="cat_name">Tên danh mục</label>
                        <input type="text" name="cat_name" id="cat_name" value="<?php if(!empty($list_cat['cat_name'])) echo $list_cat['cat_name']?>">
                        <span class="error"><?php echo form_error('cat_name')?></span>
                        <label for="creator_cat">Người tạo</label>
                        <input type="text" name="creator_cat" id="creator_cat" value="<?php if(!empty($list_cat['creator_cat'])) echo $list_cat['creator_cat']?>">
                        <label for="parent_id">Cấp bậc danh mục</label>
                        <select name="parent_id">
                            <option value="">---- Chọn ----</option>
                            <option <?php if($list_cat['parent_id'] == 0) echo "selected = 'selected'"?> value="1">   Cấp bậc 0     </option>
                            <option <?php if($list_cat['parent_id'] == 1) echo "selected = 'selected'"?> value="2">   Cấp bậc 1     </option>
                        </select>
                        <span class="error"><?php echo form_error('parent_id')?></span>
                        <button type="submit" name="btn_update_post_cat" id="btn_update_post_cat">Cập
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