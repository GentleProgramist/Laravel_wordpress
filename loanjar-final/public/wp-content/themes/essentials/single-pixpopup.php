<?php namespace Elementor; ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body class="render">



<?php
	$size = 'col-12 col-sm-6';
	$width = '';
	if(!empty(get_post_meta( get_the_ID(), 'pix-popup-size', true ))){
		if(get_post_meta( get_the_ID(), 'pix-popup-size', true )=='custom'){
			$size = '';
			$width = 'width:'.get_post_meta( get_the_ID(), 'pix-popup-width', true ).';';
		}else{
			$size = get_post_meta( get_the_ID(), 'pix-popup-size', true );
		}

	}
	switch ($size) {
		case 'col-12 col-sm-4':
			$size .= ' offset-sm-4';
			break;
		case 'col-12 col-sm-6':
			$size .= ' offset-sm-3';
			break;
		case 'col-12 col-sm-8':
			$size .= ' offset-sm-2';
			break;
		case 'col-12 col-sm-10':
			$size .= ' offset-sm-1';
			break;
	}
?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'essentials' ); ?></a>

	<div id="content" class="site-content bg-dark-opacity-6 h-100 w-100 d-inline-block" style="height:100vh !important;">
		<div class="container " style="">
			<div class="row ">
	<div class="<?php echo esc_attr( $size ); ?> p-0" style="<?php echo esc_html( $width ); ?>" >
		<div id="pix-popup-builder-content" class="pix-my-200 bg-white rounded-lg d-inline-block w-100 position-relative pix-popup-edit">
			<?php
			the_post();
			the_content();
		  ?>
		</div>
	</div>


	<div class="modal fade" id="pixfortPopupBuilder" tabindex="-1" role="dialog" aria-labelledby="pixfortPopupBuilder" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content" style="position:relative">
	      <div class="modal-body">

	      </div>
	    </div>
	  </div>
	</div>


</script>
<?php
	wp_footer();
?>
