<?php
$text_class = 'text-black';
$bredcrumb_style = 'dark';
if(!empty(pix_get_option('shop-intro-light'))){
    $text_class = 'text-white';
    $bredcrumb_style = 'light';
}
get_template_part( 'template-parts/intro' );
?>
<div class="pix-main-intro pix-intro-1 bg-primary">
    <div class="pix-intro-img jarallax" data-jarallax data-speed="0.4" >
        <img class="jarallax-img pix-opacity-8" src="<?php echo esc_html( pix_get_option('shop-intro-img')['url'] ); ?>" />
    </div>
    <div class="container" style="padding-top:150px;padding-bottom:50px;">
        <div class="pix-main-intro-placeholder"></div>
        <div class="row d-flex h-100 justify-content-center align-items-center" >
            <div class="col-xs-12 col-lg-12" >
                <div class="text-center my-2">
                    <?php
                    if ( apply_filters( 'woocommerce_show_page_title', true ) ){
                        ?>
                        <h3 class="pix-sliding-headline font-weight-bold" data-class="<?php echo esc_attr( $text_class ); ?>">
                            <?php
                            woocommerce_page_title();
                            ?>
                        </h3>
                        <?php
                    }
                    ?>
                    <div class="text-center">
                        <?php woocommerce_breadcrumb(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <?php
        if(!empty(pix_get_option('shop-divider-style'))){
            if( function_exists('pix_get_divider') ){
                $is_class_color = false;
                $d_color = '#fff';
                if(!empty(pix_get_option('shop-bg-color'))){
                    if(pix_get_option('shop-bg-color')=='custom'){
                        $d_color = pix_get_option('custom-shop-bg-color');
                        $is_class_color = false;
                    }else{
                        $d_color = 'bg-'.pix_get_option('shop-bg-color');
                        $is_class_color = true;
                    }
                }
                $b_divider_opts = array(
                    'd_divider_select'		    => pix_get_option('shop-divider-style'),
                    'd_layers'				    => '3',
                    'd_1_is_gradient'			=> '',
                    'd_1_color'					=> $d_color,
                    'is_class_color'			=> $is_class_color,
                    'd_2_is_gradient'			=> '',
                    'd_2_animation'				=> 'fade-in-up',
                    'd_2_delay'					=> '500',
                    'd_3_is_gradient'			=> '',
                    'd_3_color_2'				=> '',
                    'd_3_animation'				=> 'fade-in-up',
                    'd_3_delay'					=> '700',
                    'd_high_index'				=> '',
                    'd_flip_h'					=> '',
                    'extra_classes'				=> 'position-relative',
                );
                $divider_height = pix_get_option('shop-divider-height');
                if($divider_height){
                    echo esc_html( pix_get_divider(pix_get_option('shop-divider-style'), '#fff', 'bottom', false, '#fff', $b_divider_opts, $divider_height) );
                }else{
                    echo esc_html( pix_get_divider(pix_get_option('shop-divider-style'), '#fff', 'bottom', false, '#fff', $b_divider_opts) );
                }
            }
        }
        ?>
    </div>
</div>
