<?php
    get_header();
    global $page, $error;
?>

<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">      
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">CHỈNH SỬA TRANG</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form action="" method="POST">
                        <?php global $success; if(isset($success['update_page'])) echo "<p class='success'>$success[update_page]</p>" ?>
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="page_title" id="page_title" value="<?php echo $page['page_title']; ?>">
                        <span class="error"><?php echo form_error('page_title')?></span>
                        <label for="creator">Người tạo</label>
                        <input type="text" name="creator" id="creator" value="<?php echo $page['creator']; ?>">
                        <span class="error"><?php echo form_error('creator')?></span>
                        <label for="title">Slug ( Friendly_url )</label>
                        <input type="text" name="slug" id="slug" value="<?php echo $page['slug']; ?>">
                        <span class="error"><?php echo form_error('slug')?></span>
                        <label for="content">Nội dung</label>
                        <textarea name="content" id="desc" class="ckeditor"><?php echo $page['content']; ?></textarea>
                        <span class="error"><?php echo form_error('content')?></span>
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
