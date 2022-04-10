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
                    <h3 id="index" class="fl-left">THÊM BÀI VIẾT</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form enctype="multipart/form-data" method="POST">
                        <label for="post_title">Tiêu đề</label>
                        <input type="text" name="post_title" id="post_title" value="<?php if (!empty($_SESSION['post_title'])) echo $_SESSION['post_title']; ?>">
                        <span class="error"><?php echo form_error('post_title') ?></span>
                        <label for="slug">Slug ( Friendly_url )</label>
                        <input type="text" name="slug" id="slug" value="<?php if (!empty($_SESSION['slug'])) echo $_SESSION['slug']; ?>">
                        <span class="error"><?php echo form_error('slug') ?></span>
                        <label for="creator">Người tạo</label>
                        <input type="text" name="creator" id="creator" value="<?php if (!empty($_SESSION['creator'])) echo $_SESSION['creator']; ?>">
                        <label for="content">Nội dung</label>
                        <textarea name="content" id="desc" class="ckeditor">
                             <?php if (!empty($_SESSION['content'])) echo $_SESSION['content']; ?>
                        </textarea>
                        <span class="error"><?php echo form_error('content') ?></span>
                        <div id="uploadFile">
                            <input type="file" name="file" id="file" onchange="ImagesFileAsURL()">
                            <div id="displayImg">

                            </div>
                            <?php
                            if (isset($_POST['btn_add_product'])) {
                                if (empty($error)) {
                                    echo "<img src='{$upload_file}' alt='Đây là ảnh bài viết'>";
                                    echo "<a href='{$upload_file}'>Tên file: {$_FILES['file']['name']}</a>";
                                }
                            }
                            ?>
                            <span class="error"><?php echo form_error('file'); ?></span>
                        </div>
                        <label>Danh mục cha</label>
                        <select name="category">
                            <option value="">-- Chọn danh mục --</option>
                            <?php foreach ($list_cat as $item) {
                            ?>
                                <option <?php if (!empty($_SESSION['category']) && $_SESSION['category'] == $item['cat_id']) echo "selected" ?> value="<?= $item['cat_id'] ?>">
                                    <?php if ($item['parent_id'] == 0) echo $item['cat_name'];
                                    else echo "--" . $item['cat_name']; ?>
                                </option>
                            <?php
                            } ?>
                        </select>
                        <span class="error"><?php echo form_error('category'); ?></span>
                        <button type="submit" name="btn_add_post" id="btn_add_post" value="Thêm bài viết">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>