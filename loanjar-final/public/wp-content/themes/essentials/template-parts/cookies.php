<?php
$policy_link = '';
$policy_popup = '';
$policy_target = '';
if(pix_get_option('pix-cookies-page')){
	$policy_link = get_permalink(pix_get_option('pix-cookies-page'));
}
if( !empty(pix_get_option('pix-cookies-url')) && pix_get_option('pix-cookies-url') ){
	$policy_link = pix_get_option('pix-cookies-url');
}
if( !empty(pix_get_option('pix-cookies-target')) && pix_get_option('pix-cookies-target') ){
	$policy_target = '_blank';
}
$exit_data = '';
$classes = '';
$popup_data = '';
if(pix_get_option('pix-cookies-popup')){
	$classes = 'pix-popup-link';
	$nonce = wp_create_nonce("popup_nonce");
	$popup_data = admin_url('admin-ajax.php?action=pix_popup_content&id='.pix_get_option('pix-cookies-popup').'&nonce='.$nonce);
}
$nonce = wp_create_nonce("close_cookies");
$close_link = admin_url('admin-ajax.php?action=pix_close_cookies&nonce='.$nonce);

$cookie_img = get_template_directory_uri() . '/inc/images/cookie.png';
if( !empty(pix_get_option('cookie-img')) && pix_get_option('cookie-img') ){
	if(pix_get_option('cookie-img')['url']){
		$cookie_img = pix_get_option('cookie-img')['url'];
	}

}
?>
<div class="pix-cookie-banner position-fixed">
    <div class="pix-cookie-inner pix-px-10 pix-py-5 rounded-xl shadow-lg pix-mb-20 bg-white fly-sm shadow-hover-lg animate-in" data-anim-type="fade-in-up" data-anim-delay="1000">
        <div class="d-sm-flex align-items-center">
            <img class="pix-cookie-img mr-1 mr-sm-2" width="30" height="30" src="<?php echo esc_url( $cookie_img ); ?>" alt="cookie" />
            <span class="text-body-default font-weight-bold text-sm">
                <?php
                    if(pix_get_option('pix-cookies-text')){
						if(function_exists( 'icl_register_string' )){
							echo apply_filters( 'wpml_translate_single_string', pix_get_option('pix-cookies-text'), 'Theme', 'essentials-cookies-text' );
						}else{
							echo pix_pll__( pix_get_option('pix-cookies-text') );
						}


                    }
                ?>
				<a target="<?php echo esc_attr($policy_target); ?>" href="<?php echo esc_url( $policy_link ); ?>" class="ml-12 text-heading-default font-weight-bold text-sm <?php echo esc_attr( $classes ); ?>" data-popup-link="<?php echo esc_attr( $popup_data ); ?>" >
	                <?php
	                    if(pix_get_option('pix-cookies-btn')){
							if(function_exists( 'icl_register_string' )){
								echo apply_filters( 'wpml_translate_single_string', pix_get_option('pix-cookies-btn'), 'Theme', 'essentials-cookies-btn' );
							}else{
								echo pix_pll__( pix_get_option('pix-cookies-btn') );
							}

	                    }
	                ?>
	            </a>
            </span>

            <a href="<?php echo esc_url( $close_link ); ?>" class="pix-cookies-close text-20 line-height-0 ml-2 d-inline-block text-gray-4"><span class="screen-reader-text sr-only"><?php echo esc_attr__( 'Close', 'essentials' ); ?></span><i class="align-self-center pixicon-close-circle"></i></a>
        </div>
    </div>
</div>
