<?php
    get_header();
    global $page, $num_page;
?>
<div id="main-content-wp" class="clearfix blog-page">
    <div class="wp-inner">
        <?php
            get_breadcrumb();
        ?>
        <div class="main-content fl-right">
            <div class="section" id="list-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title">Bài viết</h3>
                </div>
                <div class="section-detail">
                <?php if(!empty($list_post)){ ?>
                    <ul class="list-item">
                        <?php foreach($list_post as $item){ ?>
                        <li class="clearfix">
                            <a href="<?php echo $item['url_detail_post']; ?>" title="" class="thumb fl-left">
                                <img src="<?php echo $item['post_thumb']; ?>" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="<?php echo $item['url_detail_post']; ?>" title="" class="title"><?php echo $item['post_title']; ?></a>
                                <span class="create-date"><?php echo date('d/m/Y', $item['create_date_post']); ?> || <?php echo $item['creator']; ?></span>
                                <p class="desc"><?php if($item['cat_id'] == 1) echo "Điện thoại"; else echo "Máy tính - Laptop - Tablet"; ?></p>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                <?php } ?>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail">
                    <?php
                        echo get_pagging($num_page, $page, "?mod=post&action=main");
                    ?>
                </div>  
            </div>
        </div>
        <?php
            get_sidebar();
        ?>
    </div>
</div>
<?php
    get_footer();
?>