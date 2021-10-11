<?php

$m_stack_val = $m_stack_data->val;
$opts = array();
if(!empty($m_stack_data->opts)){
    foreach ($m_stack_data->opts as $i => $v) {
        $opts[$v->name] = $v->val;
    }
}
extract(shortcode_atts(array(
    'background' 		=> 'white',
    'custom_background' 		=> '',
    'color' 		=> 'body-default',
    'custom_color' 		=> '',

    'style' 		=> '',
    'line_color' 		=> 'gray-1',
    'bold' 		=> '',
), $opts));

$customStyle = '';
if(!empty($background&&$background=='custom')){
    if(!empty($custom_background)){
        $customStyle .= 'background: '.$custom_background.' !important;';
    }
}

if(count($m_stack_val->m_stack_1->val)>0){
 ?>
  <div class="pix-header-mobile bg-<?php echo esc_attr( $background ); ?> pix-stack-mobile text-2 sticky-top2 py-22 " style="<?php echo esc_attr($customStyle); ?>">
      <?php if($style=="border-top-wide"||$style=="border-both-wide"): ?>
          <div class="pix-header-border bg-<?php echo esc_attr( $line_color ); ?>" style="width:100%;height:1px;"></div>
      <?php endif; ?>
     <div class="container">
         <?php if($style=="border-top"||$style=="border-both"): ?>
             <div class="pix-header-border bg-<?php echo esc_attr( $line_color ); ?>" style="width:100%;height:1px;"></div>
         <?php endif; ?>
         <div class="row w-1002">
             <?php

             $col_opts = $opts;
             if(!empty($m_stack_val->m_stack_1->opts)){
                 foreach ($m_stack_val->m_stack_1->opts as $i => $v) {
                     $col_opts[$v->name] = $v->val;
                 }
             }
             $col_opts['bold'] = $bold;
             extract(shortcode_atts(array(
                 'align' 		=> 'text-left'
             ), $col_opts));
             if($align=='d-flex') $align = $align . ' justify-content-between';
              ?>
             <div class="col-12 column text-center2 <?php echo esc_attr( $align ); ?> text-md-left2 py-2">
 				<?php
     				foreach ($m_stack_val->m_stack_1->val as $key => $value) {
                        pix_get_header_elem('m_stack', $value, $col_opts);
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
