<?php
/**
 * Template part for displaying single portfolio
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package essentials
 */
?>



<div class="pix-intro-1 bg-primary">
    <div class="pix-intro-img jarallax" data-jarallax data-speed="0.4" >
		<img class="jarallax-img" src="<?php echo pix_get_option('portfolio-intro-img')['url']; ?>" />
	</div>

    <div class="container" style="height:60vh;">

        <div class="row justify-content-center align-items-center" style="height:40vh;">


            <div class="col-xs-12 col-lg-12 pb-4">
                <div class="text-center my-5">
					<?php
					the_title( '<h3 class=" pix-sliding-headline font-weight-bold" data-class="text-white">', '</h3>' );
					?>
                    <div>
						<?php
						 pix_get_breadcrumb('light');
						 ?>
					</div>
                </div>
            </div>


        </div>
    </div>

</div>



<?php
$classes = '';
if(!get_post_meta( get_the_ID(), 'pix-hide-top-padding', true )){
		$classes .= 'pt-5';
}
?>
<div id="content" class="site-content <?php echo esc_html( $classes );?> pb-5 mb-5">
	<div class="container">




		<div class="row" style="margin-top:-80px;box-shadow: 0px 100px 100px 0px rgba(0,0,0,0.1);">


	<div class="col-12 p-0 m-0">
        <div class="d-inline-block ">
        <?php


        if( function_exists('pix_get_divider') ){
            $b_divider_opts = array(
                'd_divider_select'		=> pix_get_option('portfolio-divider-style'),
                'd_layers'				=> '3',
                'd_1_is_gradient'			=> '',
                'd_1_color'					=> '#fff',
                'd_2_is_gradient'			=> '',
                'd_2_color'					=> 'rgba(255,255,255,0.6)',
                'd_2_animation'				=> 'fade-in-up',
                'd_2_delay'					=> '500',
                'd_3_is_gradient'			=> '',
                'd_3_color'					=> '',
                'd_3_color_2'				=> '',
                'd_3_animation'				=> 'fade-in-up',
                'd_3_delay'					=> '700',
                'd_high_index'				=> '',
                'd_flip_h'					=> '',
            );
            $divider_height = pix_get_option('portfolio-divider-height');
            if($divider_height){
                echo pix_get_divider(pix_get_option('portfolio-divider-style'), '#fff', 'bottom', false, '#fff', $b_divider_opts, $divider_height);
            }else{
                echo pix_get_divider(pix_get_option('portfolio-divider-style'), '#fff', 'bottom', false, '#fff', $b_divider_opts);
            }

        }
        
        ?>
        </div>
    </div>
    <div class="col-12 bg-white rounded-b-lg2 shadow-lg2" style="">
        <div class="pix-pb-25 pix-px-10 pt-0">

            <div id="primary" class="content-area">
                <main id="main" class="site-main">


    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>




        <div class="entry-content">

            <?php

            echo get_post_meta( get_the_ID(), "portfolio-text", true);



            if(!empty(pix_get_option('portfolio-post-info'))){
                echo '<div class="p-3 bg-gray-12 shadow-sm rounded-lg text-body-default font-weight-bold text-xs">';
                    essentials_posted_on();
                    essentials_posted_by();
                echo '</div>';
            }

             ?>


            <?php

            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_attr__( 'Pages:', 'essentials' ),
                'after'  => '</div>',
            ) );
            ?>
        </div><!-- .entry-content -->

        <footer class="entry-footer">
            <?php essentials_entry_footer(); ?>
        </footer><!-- .entry-footer -->

        <div>
        <?php
        the_content();
        ?>
        </div>



    </article><!-- #post-<?php the_ID(); ?> -->



                </main><!-- #main -->
            </div><!-- #primary -->



         </div>
        </div>


        <div class="col-12 p-0 m-0" style="line-height:0 !important;">
            <div class="d-inline-block " >
            <?php

            if(!empty(pix_get_option('portfolio-divider-style'))){
            if( function_exists('pix_get_divider') ){
                $b_divider_opts = array(
                    'd_divider_select'		=> pix_get_option('portfolio-divider-style'),
                    'd_layers'				=> '1',
                    'd_1_is_gradient'			=> '',
                    'd_1_color'					=> '#fff',
                    'd_2_is_gradient'			=> '',
                    'd_2_color'					=> 'rgba(255,255,255,0.6)',
                    'd_2_animation'				=> 'fade-in-up',
                    'd_2_delay'					=> '500',
                    'd_3_is_gradient'			=> '',
                    'd_3_color'					=> '',
                    'd_3_color_2'				=> '',
                    'd_3_animation'				=> 'fade-in-up',
                    'd_3_delay'					=> '700',
                    'd_high_index'				=> '',
                    'd_flip_h'					=> '',
                );
                $divider_height = pix_get_option('portfolio-divider-height');
                if($divider_height){
                    echo pix_get_divider(pix_get_option('portfolio-divider-style'), '#fff', 'top', false, '#fff', $b_divider_opts, $divider_height);
                }else{
                    echo pix_get_divider(pix_get_option('portfolio-divider-style'), '#fff', 'top', false, '#fff', $b_divider_opts);
                }

            }
            }
            ?>
            </div>
        </div>



        </div>


</div>
</div>
