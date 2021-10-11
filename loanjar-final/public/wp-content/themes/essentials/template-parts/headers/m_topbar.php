<?php

$m_topbar_val = $m_topbar_data->val;
$opts = array();
if(!empty($m_topbar_data->opts)){
    foreach ($m_topbar_data->opts as $i => $v) {
        $opts[$v->name] = $v->val;
    }
}
extract(shortcode_atts(array(
    'background' 		=> 'gray-1',
    'custom_background' 		=> 'gray-1',
    'style' 		=> '',
    'line_color' 		=> 'gray-1',
    'line_custom_color' 		=> '',
    'bold' 		=> '',
    'color' 		=> 'body-default',
    'custom_color' 		=> '',
), $opts));

$style = '';
if(!empty($background&&$background=='custom')){
    if(!empty($custom_background)){
        $style .= 'background: '.$custom_background.' !important;';
    }
}
if(count($m_topbar_val->m_topbar_1->val)>0){
 ?>
 <div class="pix-topbar pix-header-mobile pix-topbar-normal bg-<?php echo esc_attr( $background ); ?> text-white p-sticky py-22 " style="<?php echo esc_attr($style); ?>" >
     <div class="container">
         <div class="row">
             <?php

             $col_opts = $opts;
             if(!empty($m_topbar_val->m_topbar_1->opts)){
                 foreach ($m_topbar_val->m_topbar_1->opts as $i => $v) {
                     $col_opts[$v->name] = $v->val;
                 }
             }
             $col_opts['bold'] = $bold;
             extract(shortcode_atts(array(
                 'align' 		=> 'text-left'
             ), $col_opts));
             if($align=='d-flex') $align = $align . ' justify-content-between';
              ?>
             <div class="col-12 column <?php echo esc_attr( $align ); ?> py-md-02 pix-py-10">
 				<?php
     				foreach ($m_topbar_val->m_topbar_1->val as $key => $value) {
                        pix_get_header_elem('m_topbar', $value, $opts);
     				}
 				?>
             </div>

         </div>
         <?php if($style=="border-bottom"): ?>
             <div class="bg-<?php echo esc_attr( $line_color ); ?>" style="width:100%;height:1px;"></div>
         <?php endif; ?>
     </div>
     <?php if($style=="border-bottom-wide"): ?>
         <div class="bg-<?php echo esc_attr( $line_color ); ?>" style="width:100%;height:1px;"></div>
     <?php endif; ?>
 </div>
<?php } ?>
