<?php /* Template Name: Blog Right sidebar */

    get_header();
    $classes = '';
    $styles = '';
    if(get_post_type()==='portfolio'){
        if(!empty(pix_get_option('portfolio-bg-color'))){
            if(pix_get_option('portfolio-bg-color')=='custom'){
                $styles = 'style="background:'.pix_get_option('custom-portfolio-bg-color').';"';
            }else{
                $classes = 'bg-'.pix_get_option('portfolio-bg-color'). ' ';
            }
        }
    }else{
        if(!empty(pix_get_option('blog-bg-color'))){
            if(pix_get_option('blog-bg-color')=='custom'){
                $styles = 'style="background:'.pix_get_option('custom-blog-bg-color').';"';
            }else{
                $classes = 'bg-'.pix_get_option('blog-bg-color'). ' ';
            }
        }
    }
    
    $hide_top_area = false;
    $is_archive = false;
    $post_type = get_post_type();
    if(get_post_meta( get_the_ID(), 'pix-hide-top-area', true )){
        if(get_post_meta( get_the_ID(), 'pix-hide-top-area', true )==='1'){
            $hide_top_area = true;
        }
        if(get_post_type()=='page' ){
            if(empty(pix_get_option('post-with-intro'))||!pix_get_option('post-with-intro')){
                $hide_top_area = true;
            }
        }
    }
    if( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag() || is_search() ){
        $is_archive = true;
        if(empty(pix_get_option('post-with-intro'))||!pix_get_option('post-with-intro')){
            $hide_top_area = true;
        }
    }
    if(!$hide_top_area){
        get_template_part( 'template-parts/intro' );
    }else{
        ?>
		<div class="pix-main-intro-placeholder"></div>
		<?php
    }

    if(!get_post_meta( get_the_ID(), 'pix-hide-top-padding', true )){
        $classes .= 'pt-5';
    }
?>
<div id="content" class="site-content template-blog-right-sidebar <?php echo esc_html( $classes ); ?> bg-white2 pb-52" <?php echo esc_html( $styles ); ?> >
    <div class="container">
        <div class="row">
            <?php if($is_archive&&$hide_top_area){ ?>
                <div class="col-12 pix-mb-20">
                    <?php
                    the_archive_title( '<h5 class="page-title text-heading-default font-weight-bold">', '</h5>' );
                    the_archive_description( '<div class="archive-description">', '</div>' );
                    ?>
                </div>
            <?php } ?>
            <div class="col-12 col-md-8 pix-mb-20">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main">
                        <?php
                        essentials_get_blog_page();
                        if(!$is_archive){
                            the_content();
                        }
                        ?>
                    </main>
                </div>
            </div>
            <?php get_sidebar("test"); ?>
        </div>
    </div>
</div>
<?php
get_footer();
