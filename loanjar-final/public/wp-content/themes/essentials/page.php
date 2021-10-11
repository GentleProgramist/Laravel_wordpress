<?php
/**
* The template for displaying all pages
*
* This is the template that displays all pages by default.
* Please note that this is the WordPress construct of pages
* and that other 'pages' on your WordPress site may use a
* different template.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package essentials
*/


if(!empty($_GET["template"])){
    switch ($_GET["template"]) {
        case 'blog-right-sidebar':
            get_template_part( 'templates/template-blog-right-sidebar' );
            break;
        case 'blog-left-sidebar':
            get_template_part( 'templates/template-blog-left-sidebar' );
            break;
        case 'full-width':
            get_template_part( 'templates/template-full-width' );
            break;
        default:
            break;
    }
}


get_header();

$classes = 'bg-white ';
$styles = '';
$col_classes = 'col-12';

if(!empty(pix_get_option('pages-bg-color'))){
    if(pix_get_option('pages-bg-color')=='custom'){
        $styles = 'background:'.pix_get_option('custom-pages-bg-color').';';
        $classes = '';
    }else{
        $classes = 'bg-'.pix_get_option('pages-bg-color'). ' ';
    }
}

if(!empty(pix_get_option('pages-with-intro'))&&pix_get_option('pages-with-intro')){
	get_template_part( 'template-parts/intro' );
}

if(!function_exists('essentials_core_plugin')){
    get_template_part( 'template-parts/intro' );
    $classes .= ' pix-pb-20 ';
    $col_classes = 'col-12 col-md-8 offset-md-2';
}

if(!get_post_meta( get_the_ID(), 'pix-hide-top-padding', true )){
    $classes .= 'pt-5';
}

$containerClass = 'container';
if( class_exists( '\Elementor\Plugin' ) ) {
    if ( Elementor\Plugin::instance()->db->is_built_with_elementor( get_the_ID() ) ) {
        if(empty(pix_get_option('pix-add-default-container'))){
            $containerClass = 'container-fluid px-0 mx-0';
        }
    }
}

?>
<div id="content" class="site-content <?php echo esc_html( $classes );?>" style="<?php echo esc_html( $styles ); ?>" >
    <div class="<?php echo esc_attr($containerClass); ?>">
        <div class="row">

            <div class="<?php echo esc_attr($col_classes); ?>">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main">

                        <?php
                        while ( have_posts() ) :
                            the_post();

                            get_template_part( 'template-parts/content', 'page' );
                            ?>
                            <div class="clearfix"></div>
                            <?php
                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;

                        endwhile; // End of the loop.
                        ?>

                    </main><!-- #main -->
                </div><!-- #primary -->
            </div>


        </div>
    </div>
</div>
<?php

get_footer();
