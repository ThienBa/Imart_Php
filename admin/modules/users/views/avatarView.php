<?php
    get_header();
?>
<div id="main-content-wp" class="info-account-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="?mod=users&action=add_user" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Cập nhật avatar</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <?php
            get_sidebar('users');
        ?>
        <div id="content" class="fl-right">
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <h1>Tải lên ảnh đại diện mới</h1><br>
                    <?php global $success; if(!empty($success['change_avatar'])) echo "<p class='success'>$success[change_avatar]</p>" ?>
                    <form enctype="multipart/form-data" action="" method="POST">
                        <input type="file" name="file" id="file" onchange="ImagesFileAsURL()">
                        <div id="displayImg">
                            <?php global $upload_file;
                        if(isset($_POST['btn_upload'])){
                            if(empty($error)){
                                if(move_uploaded_file($_FILES['file']['tmp_name'], $upload_file)){
                                    echo "<img width='300px' src='{$upload_file}' alt='Đây là ảnh'>";
                                    echo "<a href='{$upload_file}'>Dowload file: {$_FILES['file']['name']}</a>";
                                }
                            } 
                        }
                        ?>
                        </div>
                        <span class="error"><?php echo form_error('file_type', 'file_size'); ?></span>
                        <br><br>
                        <input type="submit" name="btn_upload" value="Cập nhật ảnh đại diện">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    get_footer();
?>