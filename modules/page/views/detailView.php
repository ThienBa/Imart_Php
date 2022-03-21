<?php
    get_header();
    $id = (int)$_GET['id'];
?>
<div id="main-content-wp" class="clearfix detail-blog-page">
    <div class="wp-inner">
        <?php
            get_breadcrumb();
        ?>
        <div class="main-content fl-right">
            <div class="section" id="detail-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title"><?php echo $page['page_title']; ?></h3>
                </div>
                <div class="section-detail">
                    <span class="create-date"><?php echo date('d/m/Y', $page['create_date']); ?></span>
                    <div class="detail">
                        <?php
                            echo $page['content'];
                        ?>
                    </div>
                </div>
            </div>
            <div class="section" id="social-wp">
                <div class="section-detail">
                    <div class="fb-like" data-href="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                    <div class="g-plusone-wp">
                        <div class="g-plusone" data-size="medium"></div>
                    </div>
                    <div class="fb-comments" id="fb-comment" data-href="" data-numposts="5"></div>
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