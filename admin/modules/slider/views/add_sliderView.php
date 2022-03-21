<?php
    get_header();
    global $error, $upload_file, $success;
?>
<div id="main-content-wp" class="add-cat-page slider-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm Slider</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <?php if(isset($success['add_slider'])) echo "<p class='success'>$success[add_slider]</p>" ?>
                <div class="section-detail">
                    <form enctype="multipart/form-data" method="POST">
                        <label for="slider_name">Tên slider</label>
                        <input type="text" name="slider_name" id="slider_name">
                        <span class="error"><?php echo form_error('slider_name'); ?></span>
                        <label for="slider_link">Link</label>
                        <input type="text" name="slider_link" id="slider_link">
                        <span class="error"><?php echo form_error('slider_link'); ?></span>
                        <label for="slider_desc">Mô tả</label>
                        <textarea name="slider_desc" id="desc" class="ckeditor"></textarea>
                        <span class="error"><?php echo form_error('slider_desc'); ?></span>
                        <label for="slider_order">Thứ tự</label>
                        <input type="number" min='1' max='100' name="slider_order" id="slider_order">
                        <span class="error"><?php echo form_error('slider_order'); ?></span>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="file" id="upload-thumb">
                            <?php
                                if(isset($_POST['btn_add_slider'])){
                                    if(empty($error)){
                                        echo "<img src='{$upload_file}' alt='Đây là ảnh slider'>";
                                        echo "<a href='{$upload_file}'>Tên file: {$_FILES['file']['name']}</a>";
                                    }   
                                }
                            ?>
                            <span class="error"><?php echo form_error('file'); ?></span>
                        </div>
                        <label>Trạng thái</label>
                        <select name="slider_status">
                            <option value="">-- Chọn trạng thái --</option>
                            <option value="1">Công khai</option>
                            <option value="2">Chờ duyệt</option>
                        </select>
                        <span class="error"><?php echo form_error('slider_status'); ?></span>
                        <button type="submit" name="btn_add_slider" id="btn_add_slider">Thêm slider</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    get_footer();
?>  