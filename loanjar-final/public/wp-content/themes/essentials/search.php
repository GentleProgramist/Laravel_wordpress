<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package essentials
 */

$blog_template = 'right-sidebar';
if(!empty(pix_get_option('blog-page-template'))){
	$blog_template = pix_get_option('blog-page-template');
}

switch ($blog_template) {
	case 'left-sidebar':
		get_template_part( 'templates/template-blog-left-sidebar');
		break;
	case 'full-width':
		get_template_part( 'templates/template-blog-without-sidebar');
		break;
	case 'with-offset':
		get_template_part( 'templates/template-blog-with-offset');
		break;
	default:
		get_template_part( 'templates/template-blog-right-sidebar');
}