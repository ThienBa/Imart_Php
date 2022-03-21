<?php get_header();?>
<?php   
    global $start, $result_search, $page, $num_page;;
?>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách trang</h3>
                    <a href="?mod=pages&action=add_page" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span
                                        class="count">(<?php global $num_row; echo $num_row; ?>)</span></a></li>
                        </ul>
                        <form method="POST" class="form-s fl-right">
                            <input type="text" name="search" id="search"
                                value="<?php if(isset($_POST['search'])) echo $_POST['search']; ?>">
                            <input type="submit" name="btn_search" value="Tìm kiếm">
                        </form>
                    </div>
                    <div class="table-responsive">
                        <?php
                            if(!isset($_POST['btn_search']) || empty($_POST['search'])){
                                if(!empty($list_page)){ 
                        ?>
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tiêu đề</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Ngày tạo</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $temp = $start; 
                                    foreach ($list_page as $item) {
                                    $temp++; 
                                ?>
                                <tr>
                                    <td><span class="tbody-text"><?php echo $temp; ?></h3></span>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="<?php echo $item['url_update']?>"
                                                title=""><?php echo $item['page_title']; ?></a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="<?php echo $item['url_update']?>" title="Sửa" class="edit"><i
                                                        class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="<?php echo $item['url_delete']?>" title="Xóa" class="delete"><i
                                                        class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text"><?php echo $item['creator']; ?></span></td>
                                    <td><span
                                            class="tbody-text"><?php echo date('d/m/Y', $item['create_date']); ?></span>
                                    </td>
                                </tr>
                                <?php 
                                    } 
                                ?>
                            </tbody>
                        </table>
                        <?php 
                            }
                        }
                        ?>
                        <?php 
                            if(isset($_POST['btn_search']) && !empty($_POST['search'])){    
                                if(!empty($result_search)){ 
                        ?>
                        <p>Có <?php echo count($result_search); ?> kết quả phù hợp với từ khóa
                            <b>"<?php if(!empty($_POST['search'])) echo $_POST['search']; ?>"</b></p>
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tiêu đề</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Ngày tạo</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $temp = 0; 
                                    foreach ($result_search as $page) {
                                    $temp++; 
                                ?>
                                <tr>
                                    <td><span class="tbody-text"><?php echo $temp; ?></h3></span>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="<?php echo $page['url_update']?>"
                                                title=""><?php echo $page['page_title']; ?></a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="<?php echo $page['url_update']?>" title="Sửa" class="edit"><i
                                                        class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="<?php echo $page['url_delete']?>" title="Xóa" class="delete"><i
                                                        class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text"><?php echo $page['creator']; ?></span></td>
                                    <td><span
                                            class="tbody-text"><?php echo date('d/m/Y', $page['create_date']); ?></span>
                                    </td>
                                </tr>
                                <?php 
                                        } 
                                    }else{
                                ?>
                                <p>Không có kết quả nào phù hợp với từ khóa
                                    <b>"<?php if(!empty($_POST['search'])) echo $_POST['search']; ?>"</b></p>
                                <?php
                                    }
                                ?>
                            </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <?php
                        if(!isset($_POST['search'])||empty($_POST['search'])){
                        echo get_pagging($num_page, $page, "?mod=pages&action=detail");
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>