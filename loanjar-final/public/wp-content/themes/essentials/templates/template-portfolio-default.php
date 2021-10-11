<?php /* Template Name: Portfolio default */

get_header();
$classes = '';
$styles = '';
if(!empty(pix_get_option('portfolio-bg-color'))){
    if(pix_get_option('portfolio-bg-color')=='custom'){
        $styles = 'background:'.pix_get_option('custom-portfolio-bg-color').';';
    }else{
        $classes = 'bg-'.pix_get_option('portfolio-bg-color').' ';
    }
}
get_template_part( 'template-parts/intro' );
if(!get_post_meta( get_the_ID(), 'pix-hide-top-padding', true )){
    $classes .= 'pt-5';
}
?>
<div id="content" class="site-content pix-pt-40 <?php echo esc_html( $classes );?> bg-white2 pb-52" style="<?php echo esc_html( $styles ); ?>" >
    <div class="container">
        <div class="row">
            <div class="col-12 pix-mb-20">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main">
                        <?php
                        essentials_get_portfolio_page();
                        the_content();
                        ?>
                    </main>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
