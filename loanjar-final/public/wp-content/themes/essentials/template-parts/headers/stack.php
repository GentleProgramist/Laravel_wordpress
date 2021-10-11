<?php

$stack_val = $stack_data->val;
$opts = array();
if(!empty($stack_data->opts)){
    foreach ($stack_data->opts as $i => $v) {
        $opts[$v->name] = $v->val;
    }
}
extract(shortcode_atts(array(
    'background' 		=> 'gray-1',
    'style' 		=> '',
    'line_color' 		=> 'gray-1',
    'bold' 		=> '',
    'color' 		=> 'body-default',
    'custom_color' 		=> '',
    'custom_background' 		=> '',
), $opts));

$cont_class = 'container';
if(strcmp($header_style, "default-full")==0 || strcmp($header_style, "transparent-full")==0){
    $cont_class = 'container-fluid';
}
$opts['is_secondary_font'] = $is_secondary_font;
$custom_stack_style = '';
if(!empty($background&&$background=='custom')){
    if(!empty($custom_background)){
        $custom_stack_style = 'background:'.$custom_background.';';
    }
}

if( !empty($stack_val->stack_1->val)
    || !empty($stack_val->stack_2->val)
    || !empty($stack_val->stack_3->val)
){

 ?>


  <div class="pix-header-desktop d-block position-relative h-1002 w-100 pix-header-stack bg-<?php echo esc_attr( $background ); ?> sticky-top2" style="<?php echo esc_attr($custom_stack_style); ?>">
      <?php if($style=="border-top-wide"||$style=="border-both-wide"): ?>
          <div class="pix-header-border bg-<?php echo esc_attr( $line_color ); ?>" style="width:100%;height:1px;"></div>
      <?php endif; ?>
     <div class="<?php echo esc_html( $cont_class ); ?>">
         <?php if($style=="border-top"||$style=="border-both"): ?>
             <div class="pix-header-border bg-<?php echo esc_attr( $line_color ); ?>" style="width:100%;height:1px;"></div>
         <?php endif; ?>
         <div class="row w-1002 d-flex align-items-center align-items-stretch">
             <?php
             $col_opts = $opts;
             if(!empty($stack_val->stack_1->opts)){
                 foreach ($stack_val->stack_1->opts as $i => $v) {
                     $col_opts[$v->name] = $v->val;
                 }
             }
             extract(shortcode_atts(array(
                 'align' 		=> 'text-left'
             ), $col_opts));
             $align = pix_align_to_flex($align);
             $col_opts['bold'] = $bold;

             $display_col = sizeof($stack_val->stack_1->val)>0? 'pix-header-min-height':'';
              ?>
             <div class="col-12 col-lg-4 column <?php echo esc_attr( $display_col ); ?> <?php echo esc_attr( $align ); ?> py-md-0 d-flex align-items-center">
 				<?php
     				foreach ($stack_val->stack_1->val as $key => $value) {
                        pix_get_header_elem('stack', $value, $col_opts);
     				}
 				?>
             </div>
             <?php
             $col_opts = $opts;
             if(!empty($stack_val->stack_2->opts)){
                 foreach ($stack_val->stack_2->opts as $i => $v) {
                     $col_opts[$v->name] = $v->val;
                 }
             }
             extract(shortcode_atts(array(
                 'align' 		=> 'text-center'
             ), $col_opts));
             if($align=='') $align = 'text-center';
             $align = pix_align_to_flex($align);
             $col_opts['bold'] = $bold;
             $display_col = sizeof($stack_val->stack_2->val)>0? 'pix-header-min-height':'';
              ?>
             <div class="col-12 col-lg-4 column <?php echo esc_attr( $display_col ); ?> <?php echo esc_attr( $align ); ?> py-md-0 d-flex align-items-center">
 				<?php
                    foreach ($stack_val->stack_2->val as $key => $value) {
                        pix_get_header_elem('stack', $value, $col_opts);
     				}
 				?>
             </div>
             <?php
             $col_opts = $opts;
             if(!empty($stack_val->stack_3->opts)){
                 foreach ($stack_val->stack_3->opts as $i => $v) {
                     $col_opts[$v->name] = $v->val;
                 }
             }
             $col_opts['bold'] = $bold;
             extract(shortcode_atts(array(
                 'align' 		=> 'text-right'
             ), $col_opts));
             if($align=='') $align = 'text-right';
             $align = pix_align_to_flex($align);
             $display_col = sizeof($stack_val->stack_3->val)>0? 'pix-header-min-height':'';
              ?>
             <div class="col-12 col-lg-4 column <?php echo esc_attr( $display_col ); ?> <?php echo esc_attr( $align ); ?> py-md-0 d-flex align-items-center">
 				<?php
                    foreach ($stack_val->stack_3->val as $key => $value) {
                        pix_get_header_elem('stack', $value, $col_opts);
     				}
 				?>
             </div>

         </div>
         <?php if($style=="border-bottom"||$style=="border-both"): ?>
             <div class="pix-header-border bg-<?php echo esc_attr( $line_color ); ?>" style="width:100%;height:1px;"></div>
         <?php endif; ?>
     </div>
     <?php if($style=="border-bottom-wide"||$style=="border-both-wide"): ?>
         <div class="pix-header-border bg-<?php echo esc_attr( $line_color ); ?>" style="width:100%;height:1px;"></div>
     <?php endif; ?>
 </div>
<?php } ?>
