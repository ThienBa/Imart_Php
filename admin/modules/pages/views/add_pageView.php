<?php
    get_header();
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">      
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm trang</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form enctype="multipart/form-data" method="POST">
                        <?php global $success; if(isset($success['add_page'])) echo "<p class='success'>$success[add_page]</p>" ?>
                        <label for="page_title">Tiêu đề</label>
                        <input type="text" name="page_title" id="page_title">
                        <span class="error"><?php echo form_error('page_title')?></span>
                        <label for="title">Slug ( Friendly_url )</label>
                        <input type="text" name="slug" id="slug">
                        <span class="error"><?php echo form_error('slug')?></span>
                        <label for="creator">Người tạo</label>
                        <input type="text" name="creator" id="creator">
                        <label for="content">Nội dung</label>
                        <textarea name="content" id="desc" class="ckeditor"></textarea>
                        <span class="error"><?php echo form_error('content')?></span>
                        <button type="submit" name="btn_add_page" id="btn_add_page" value="Thêm trang mới">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    get_footer();
?>
