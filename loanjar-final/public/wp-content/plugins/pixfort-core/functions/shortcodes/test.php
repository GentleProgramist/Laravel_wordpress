<?php


if( ! function_exists( 'sc_test' ) )
{
   function sc_test( $attr, $content = null )
   {
       $output  = '<div class="column one">THE TEST IS OK!';
       $output .= do_shortcode($content);
       $output .= '</div>'."\n";

       return $output;
   }
}


add_shortcode('firas_test', 'sc_test');

 ?>
