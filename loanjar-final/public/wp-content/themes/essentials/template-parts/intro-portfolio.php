<?php
/**
 * Template part for displaying page intro
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package essentials
 */

if(get_post_type() == 'portfolio') {



    $text_class = 'text-black';
    $bredcrumb_style = 'dark';
    if(!empty(pix_get_option('portfolio-intro-light'))){
        $text_class = 'text-white';
        $bredcrumb_style = 'light';
    }
?>



<div class="pix-main-intro pix-intro-1 bg-primary">
    <div class="pix-intro-img jarallax" data-jarallax data-speed="0.4" >
		<img class="jarallax-img" src="<?php echo pix_get_option('portfolio-intro-img')['url']; ?>" />
	</div>

    <div class="container" style="padding-top:200px;padding-bottom:200px;">
        <div class="pix-main-intro-placeholder"></div>

        <div class="row d-flex h-100 justify-content-center align-items-center" >


            <div class="col-xs-12 col-lg-12">
                <div class="text-center my-5">
					<?php
					the_title( '<h3 class=" pix-sliding-headline font-weight-bold" data-class="'.$text_class.'">', '</h3>' );
					?>
                    <div>
						<?php
						pix_get_breadcrumb($bredcrumb_style);
						 ?>
					</div>
                </div>
            </div>


        </div>
    </div>
    <div class="">
	<?php

    if(!empty(pix_get_option('portfolio-divider-style'))){
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
			'extra_classes'					=> 'position-relative2',
		);
        $divider_height = pix_get_option('portfolio-divider-height');
        if($divider_height){
            echo pix_get_divider(pix_get_option('portfolio-divider-style'), '#fff', 'bottom', false, '#fff', $b_divider_opts, $divider_height);
        }else{
            echo pix_get_divider(pix_get_option('portfolio-divider-style'), '#fff', 'bottom', false, '#fff', $b_divider_opts);
        }

	}
	}
	?>
    </div>
</div>


<?php } ?>
