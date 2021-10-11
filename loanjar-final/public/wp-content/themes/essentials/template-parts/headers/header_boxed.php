<?php
if(!empty($header_data->val)):
if(!empty($header_data->val->header_1)):
    $header_val = $header_data->val;
    $opts = array();
    if(!empty($header_data->opts)){
        foreach ($header_data->opts as $i => $v) {
            $opts[$v->name] = $v->val;
        }
    }
    extract(shortcode_atts(array(
        'background' 		=> 'white',
        'custom_background' 		=> '',
        'scroll_background' 		=> 'white',
        'scroll_custom_background' 		=> '#fff',
        'style' 		=> '',
        'line_color' 		=> 'gray-1',
        'bold' 		=> '',
        'color' 	                   	=> 'dark-opacity-4',
        'scroll_color' 	                => '',
        'custom_color' 		=> '',
        'header_shadow' 		=> '',
    ), $opts));

    $cont_class = 'container';
    if(strcmp($header_style, "boxed-full")==0){
        $cont_class = 'container-fluid';
    }

    $bg = '';
    if(!empty($background)){
        $bg = 'bg-'.$background;
    }
    $custom_bg = '';
    $custom_style = '';
    if(!empty($background&&$background=='custom')){
        if(!empty($custom_background)){
            $custom_bg = $custom_background;
            $custom_style = 'background:'.$custom_background.';';
        }
    }
    $scroll = '';
    $custom_scroll = '';
    if(!empty($scroll_background)){
        $scroll = 'bg-'.$scroll_background;
        if($scroll_background=='custom'){
            if(!empty($scroll_custom_background)){
                $custom_scroll = $scroll_custom_background;
            }
        }
    }

    if(!empty($color)&&$color=='custom'){
        $color = 'pix-main-header-custom';
        $customStyle = '.text-pix-main-header-custom { color: '.$custom_color.' !important; }';
        wp_register_style( 'pix-custom-header-handle', false );
        wp_enqueue_style( 'pix-custom-header-handle' );
        wp_add_inline_style( 'pix-custom-header-handle', $customStyle );
    }

    $box_classes = '';
    if(!empty($pix_topbar_background)&&$pix_topbar_background=='transparent'){
        $box_classes = 'pix-header-box-rounded-top';
    }
    $opts['is_secondary_font'] = $is_secondary_font;

    $header_classes = '';
    if($is_topbar_empty){
        $header_classes = 'pix-no-topbar pix-pt-20';
    }


    if($stack_data){
        $stack_val = $stack_data->val;
        $stack_opts = array();
        if(!empty($stack_data->opts)){
            foreach ($stack_data->opts as $i => $v) {
                $stack_opts[$v->name] = $v->val;
            }
        }
        if(!empty($stack_opts['background'])){
            if($stack_opts['background']=='transparent'){
                $box_classes .= ' rounded-xl';
            }else{

                $box_classes .= ' pix-header-box-rounded-top';
            }
        }
        if( empty($stack_val->stack_1->val)
            && empty($stack_val->stack_2->val)
            && empty($stack_val->stack_3->val)
        ){
            $box_classes .= ' rounded-xl';
        }

        $col_opts = array();
        if(!empty($header_val->header_1->opts)){
            foreach ($header_val->header_1->opts as $i => $v) {
                $col_opts[$v->name] = $v->val;
            }
        }
        extract(shortcode_atts(array(
            'align' 		=> 'text-left'
        ), $col_opts));
        $align = pix_align_to_flex($align);
    }
?>
    <header id="masthead" class="pix-header pix-header-desktop d-block2 pix-header-normal2 pix-scroll-shadow sticky-top2 position-relative pix-header-box <?php echo esc_attr( $header_classes ); ?>" data-text="<?php echo esc_attr( $color ); ?>" data-text-scroll="<?php echo esc_attr( $scroll_color ); ?>">
     <div class="<?php echo esc_attr( $cont_class ); ?>">
         <div class="pix-header-box-part <?php echo esc_attr( $header_shadow ); ?> pix-main-part pix-header-container-area bg-<?php echo esc_attr( $background ); ?> <?php echo esc_attr( $box_classes ); ?>" data-bg-class="<?php echo esc_attr( $bg ); ?>" data-bg-color="<?php echo esc_attr( $custom_bg ); ?>"  style="<?php echo esc_attr( $custom_style ); ?>" data-scroll-class="<?php echo esc_attr( $scroll ); ?>" data-scroll-color="<?php echo esc_attr( $custom_scroll ); ?>" >
             <nav class="navbar pix-main-menu navbar-hover-drop navbar-expand-lg navbar-light <?php echo esc_attr( $align ); ?>">
    				<?php
     				foreach ($header_val->header_1->val as $key => $value) {
                        pix_get_header_elem('header', $value, $opts);
     				}
    				?>
             </nav>
             <?php if($style=="border-bottom"): ?>
                 <div class="bg-<?php echo esc_attr( $line_color ); ?>" style="width:100%;height:1px;"></div>
             <?php endif; ?>

         </div>

         <?php if($style=="border-bottom-wide"): ?>
             <div class="bg-<?php echo esc_attr( $line_color ); ?>" style="width:100%;height:1px;"></div>
         <?php endif; ?>




         <?php
         if($stack_data){

             extract(shortcode_atts(array(
                 'background' 		=> 'gray-1',
                 'style' 		=> '',
                 'line_color' 		=> 'gray-1',
             ), $stack_opts));
             $stack_classes = '';
             if($bg=='bg-transparent'){
                 $stack_classes .= 'rounded-xl';
             }
             $stack_classes .= ' bg-'.$background;

          ?>

               <?php if($style=="border-top-wide"||$style=="border-both-wide"): ?>
                   <div class="pix-header-border bg-<?php echo esc_attr( $line_color ); ?>" style="width:100%;height:1px;"></div>
               <?php endif; ?>
              <div class="pix-header-desktop pix-header-stack <?php echo esc_attr( $stack_classes ); ?>  pix-header-box-part">
                  <?php if($style=="border-top"||$style=="border-both"): ?>
                      <div class="pix-header-border bg-<?php echo esc_attr( $line_color ); ?>" style="width:100%;height:1px;"></div>
                  <?php endif; ?>
                  <div class="<?php echo esc_attr( $cont_class ); ?>">
                  <div class="row">
                      <?php

                      $col_opts = $stack_opts;
                      if(!empty($stack_val->stack_1->opts)){
                          foreach ($stack_val->stack_1->opts as $i => $v) {
                              $col_opts[$v->name] = $v->val;
                          }
                      }
                      extract(shortcode_atts(array(
                          'align' 		=> 'text-left'
                      ), $col_opts));
                      $align = pix_align_to_flex($align);
                      $display_col = sizeof($stack_val->stack_1->val)>0? 'pix-header-min-height':'';
                       ?>
                      <div class="col-12 col-lg-4 column text-center <?php echo esc_attr( $display_col ); ?> <?php echo esc_attr( $align ); ?> py-md-0 d-flex align-items-center">
          				<?php
              				foreach ($stack_val->stack_1->val as $key => $value) {
                                 pix_get_header_elem('stack', $value, $col_opts);
              				}
          				?>
                      </div>
                      <?php

                      $col_opts = $stack_opts;
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
                      $display_col = sizeof($stack_val->stack_2->val)>0? 'pix-header-min-height':'';
                       ?>
                      <div class="col-12 col-lg-4 column text-center <?php echo esc_attr( $display_col ); ?> <?php echo esc_attr( $align ); ?> py-md-0 d-flex align-items-center">
          				<?php
                             foreach ($stack_val->stack_2->val as $key => $value) {
                                 pix_get_header_elem('stack', $value, $col_opts);
              				}
          				?>
                      </div>
                      <?php

                      $col_opts = $stack_opts;
                      if(!empty($stack_val->stack_3->opts)){
                          foreach ($stack_val->stack_3->opts as $i => $v) {
                              $col_opts[$v->name] = $v->val;
                          }
                      }
                      extract(shortcode_atts(array(
                          'align' 		=> 'text-right'
                      ), $col_opts));
                      if($align=='') $align = 'text-right';
                      $align = pix_align_to_flex($align);
                      $display_col = sizeof($stack_val->stack_3->val)>0? 'pix-header-min-height':'';
                       ?>
                      <div class="col-12 col-lg-4 column text-center <?php echo esc_attr( $display_col ); ?> <?php echo esc_attr( $align ); ?> py-md-0 d-flex align-items-center">
          				<?php
                             foreach ($stack_val->stack_3->val as $key => $value) {
                                 pix_get_header_elem('stack', $value, $col_opts);
              				}
          				?>
                      </div>

                  </div>
                  </div>
                  <?php if($style=="border-bottom"||$style=="border-both"): ?>
                      <div class="pix-header-border bg-<?php echo esc_attr( $line_color ); ?>" style="width:100%;height:1px;"></div>
                  <?php endif; ?>
              </div>
              <?php if($style=="border-bottom-wide"||$style=="border-both-wide"): ?>
                  <div class="pix-header-border bg-<?php echo esc_attr( $line_color ); ?>" style="width:100%;height:1px;"></div>
              <?php endif; ?>


     <?php } ?>
     </div>

 </header>

<?php
endif; ?>
<?php endif; ?>
