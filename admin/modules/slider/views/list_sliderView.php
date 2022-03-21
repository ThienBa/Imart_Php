<?php
    get_header();
    global $num_page, $page, $start, $list_full_slider, $result_search, $result_search_status;
?>
<div id="main-content-wp" class="list-product-page list-slider">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách slider</h3>
                    <a href="?page=add_cat" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count">(<?php echo count($list_full_slider); ?>)</span></a>
                                |</li>
                            <li class="publish"><a href="">Công khai <span class="count">(
                                        <?php
                                    $count = 0;
                                    foreach ($list_full_slider as $slider){ 
                                        if($slider['slider_status'] == 1){
                                           $count++;
                                        }
                                    }
                                    echo $count;
                                ?>
                                        )</span></a> |</li>
                            <li class="pending"><a href="">Chờ duyệt<span class="count">(
                                        <?php
                                    $count = 0;
                                    foreach ($list_full_slider as $slider){ 
                                        if($slider['slider_status'] == 2){
                                           $count++;
                                        }
                                    }
                                    echo $count;
                                ?>
                                        )</span></a></li>
                        </ul>
                        <form method="POST" action="" class="form-actions form-s fl-right">
                            <select name="status">
                                <option value="">Tác vụ</option>
                                <option value="1">Công khai</option>
                                <option value="2">Chờ duyệt</option>
                            </select>
                            <input type="submit" name="btn_search_status" value="Áp dụng">
                        </form>
                    </div>
                    <div class="table-responsive">
                        <?php 
                            if(isset($list_slider)){
                                if((!isset($_POST['btn_search_status']) || empty($_POST['status']))){
                        ?>
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Hình ảnh</span></td>
                                    <td><span class="thead-text">Link</span></td>
                                    <td><span class="thead-text">Thứ tự</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $count = $start;
                                    foreach ($list_slider as $slider){ 
                                        $count++;
                                ?>
                                <tr>
                                    <td><span class="tbody-text"><?php echo $count; ?></h3></span>
                                    <td>
                                        <div class="tbody-thumb">
                                            <img src="<?php echo $slider['slider_thumb']; ?>" alt="">
                                        </div>
                                    </td>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="?>"
                                                title=""><?php echo $slider['slider_link']; ?></a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="<?php echo $slider['url_delete']; ?>" title="Xóa"
                                                    class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text"><?php echo $slider['slider_order']; ?></span></td>
                                    <td><span
                                            class="tbody-text"><?php if($slider['slider_status'] == 1) echo "Công khai"; else echo "Chờ duyệt";?></span>
                                    </td>
                                    <td><span class="tbody-text"><?php echo $slider['creator']; ?></span></td>
                                    <td><span
                                            class="tbody-text"><?php echo date('d/m/Y',$slider['create_date']); ?></span>
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
                            if(isset($_POST['btn_search_status']) && !empty($_POST['status'])){    
                                if(!empty($result_search_status)){ 
                        ?>
                        <b>Có <?php echo count($result_search_status); ?> kết quả tìm kiếm</b>
                        <table class="table list-table-wp">
                            <thead>
                            <tr>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Hình ảnh</span></td>
                                    <td><span class="thead-text">Link</span></td>
                                    <td><span class="thead-text">Thứ tự</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $count = 0; 
                                    foreach ($result_search_status as $status) {
                                    $count++; 
                                ?>
                                <tr>
                                    <td><span class="tbody-text"><?php echo $count; ?></h3></span>
                                    <td>
                                        <div class="tbody-thumb">
                                            <img src="<?php echo $status['slider_thumb']; ?>" alt="">
                                        </div>
                                    </td>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="" title=""><?php echo $status['slider_link']; ?></a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="<?php echo $status['url_delete']; ?>" title="Xóa"
                                                    class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text"><?php echo $status['slider_order']; ?></span></td>
                                    <td><span
                                            class="tbody-text"><?php if($status['slider_status'] == 1) echo "Công khai"; else echo "Chờ duyệt";?></span>
                                    </td>
                                    <td><span class="tbody-text"><?php echo $status['creator']; ?></span></td>
                                    <td><span
                                            class="tbody-text"><?php echo date('d/m/Y',$status['create_date']); ?></span>
                                    </td>
                                </tr>
                                <?php 
                                        } 
                                    }else{
                                ?>
                                <b>Không có kết quả tìm kiếm nào</b>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <?php
                        if((!isset($_POST['btn_search_status']) || empty($_POST['status']))){
                            echo get_pagging($num_page, $page, "?mod=slider&action=list_slider");
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    get_footer();
?>