<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package essentials
 */

get_header();

$classes = '';
$styles = '';

if(get_post_type()=='post'){
 if(!empty(pix_get_option('blog-bg-color'))){
 	if(pix_get_option('blog-bg-color')=='custom'){
 		$styles = 'background:'.pix_get_option('custom-blog-bg-color').';';
        $classes = '';
 	}else{
 		$classes = 'bg-'.pix_get_option('blog-bg-color'). ' ';
 	}
 }
}else{
 if(!empty(pix_get_option('pages-bg-color'))){
 	if(pix_get_option('pages-bg-color')=='custom'){
 		$styles = 'background:'.pix_get_option('custom-pages-bg-color').';';
 	}else{
 		$classes = 'bg-'.pix_get_option('pages-bg-color'). ' ';
 	}
 }
}

$add_intro_placeholder = false;
if(get_post_type()=='post'){
    $post_intro = false;
    if(!empty(pix_get_option('post-with-intro'))&&pix_get_option('post-with-intro')){
        $post_intro = true;
    }

    if(!empty($_GET["post_intro"])){
        switch ($_GET["post_intro"]) {
            case 'true':
                $post_intro = true;
                break;
            case 'false':
                $post_intro = false;
                break;
        }
    }
    if($post_intro){
        get_template_part( 'template-parts/intro' );
    }else{
        $add_intro_placeholder = true;
    }
}else{
    get_template_part( 'template-parts/intro' );
}


if(!get_post_meta( get_the_ID(), 'pix-hide-top-padding', true )){
		$classes .= 'pix-pt-20';
}

$containerClass = 'container';
if(get_post_type()=='post' && !empty(pix_get_option('blog-full-width-layout'))){
	$containerClass = 'container-fluid';
}

?>

<div id="content" class="site-content <?php echo esc_html( $classes );?>" style="<?php echo esc_html( $styles ); ?>" >
	<div class="<?php echo esc_attr($containerClass); ?>">
		<div class="row">

			<?php

            if($add_intro_placeholder){
                ?>
                <div class="pix-main-intro-placeholder"></div>
                <?php
            }

            $blog_layout = 'default';
            if(!empty(pix_get_option('blog-layout'))){
                $blog_layout = pix_get_option('blog-layout');
            }
            if(!empty($_GET["blog_layout"])){
                switch ($_GET["blog_layout"]) {
                    case 'default':
                        $blog_layout = 'default';
                        break;
                    case 'right-sidebar':
                        $blog_layout = 'right-sidebar';
                        break;
                    case 'left-sidebar':
                        $blog_layout = 'left-sidebar';
                        break;
                }
            }
			while ( have_posts() ) :
				the_post();
                if(get_post_type()=='post'){
                    switch ($blog_layout) {
                        case 'left-sidebar':
                            get_template_part( 'template-parts/content', 'post-sidebar' );
                            break;
                        case 'right-sidebar':
                            get_template_part( 'template-parts/content', 'post-sidebar' );
                            break;
                        case 'default-normal':
                            get_template_part( 'template-parts/content', 'post-normal' );
                            break;
                        default:
                            get_template_part( 'template-parts/content', 'post' );
                    }
                }elseif (get_post_type() == 'elementor_library') {
                    // Elementor template page
                    ?>
                    <div class="col-12 col-md-10 offset-md-1">
                		<div id="primary" class="content-area">
                			<main id="main" class="site-main">
                				<article id="post-<?php the_ID(); ?>">
                                    <?php
                                        get_template_part( 'template-parts/content', 'page' );
                                    ?>
                                </article>
                            </main>
                        </div>
                    </div>
                <?php
            }elseif (get_post_type() == 'search') {
                get_template_part( 'template-parts/content', 'search' );
            }elseif (get_post_type() == 'none') {
                get_template_part( 'template-parts/content', 'none' );
            }else{
                ?>
				<div class="col-12">
				<?php
    	            get_template_part( 'template-parts/content', 'page' );
				?>
				</div>
				<?php
            }
			endwhile;
			?>
        </div>
    </div>
</div>
<?php
get_footer();
