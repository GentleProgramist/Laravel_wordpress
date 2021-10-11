<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<?php
$pix_overlay = 'pix-overlay-2';
if(pix_get_option('search-style')){
	$pix_overlay = 'pix-overlay-'.pix_get_option('search-style');
}

function essentials_search_body_class( $classes ) {
	$classes[] = 'demo-6 render';
	return $classes;
}
add_filter( 'body_class', 'essentials_search_body_class' );
?>
<body <?php body_class(); ?> pix-overlay="<?php echo esc_html( $pix_overlay ); ?>">
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'essentials' ); ?></a>

	<div id="content" class="site-content bg-white pb-52">
		<div class="container">
			<div class="row">

	<div class="col-12">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				<?php
	            	the_post();
	            	the_content();
				?>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
<?php

wp_footer();

?>
