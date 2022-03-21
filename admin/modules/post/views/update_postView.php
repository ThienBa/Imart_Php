<?php
    get_header();
    global $error;
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">      
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">CHỈNH SỬA BÀI VIẾT</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form action="" method="POST">
                        <?php global $success; if(isset($success['update_post'])) echo "<p class='success'>$success[update_post]</p>" ?>
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="post_title" id="post_title" value="<?php echo $post['post_title']; ?>">
                        <span class="error"><?php echo form_error('post_title')?></span>
                        <label for="creator">Người tạo</label>
                        <input type="text" name="creator" id="creator" value="<?php echo $post['creator']; ?>">
                        <span class="error"><?php echo form_error('creator')?></span>
                        <label for="title">Slug ( Friendly_url )</label>
                        <input type="text" name="slug" id="slug" value="<?php echo $post['slug']; ?>">
                        <span class="error"><?php echo form_error('slug')?></span>
                        <label for="content">Nội dung</label>
                        <textarea name="content" id="desc" class="ckeditor"><?php echo $post['content']; ?></textarea>
                        <span class="error"><?php echo form_error('content')?></span>
                        <label>Danh mục cha</label>
                        <select name="category">
                            <option value="">-- Chọn danh mục --</option>
                            <?php foreach ($list_cat as $item) {
                            ?>
                                <option <?php if (!empty($post['cat_id']) && $post['cat_id'] == $item['cat_id']) echo "selected" ?> value="<?= $item['cat_id'] ?>">
                                    <?php if ($item['parent_id'] == 0) echo $item['cat_name'];
                                    else echo "--" . $item['cat_name']; ?>
                                </option>
                            <?php
                            } ?>
                        </select>
                        <input type="submit" name="btn_update" id="btn_update" value="Cập nhật"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    get_footer();
?>
