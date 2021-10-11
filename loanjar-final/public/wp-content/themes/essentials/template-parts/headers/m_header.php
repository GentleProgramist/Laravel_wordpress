<?php

if(!empty($m_header_data->val)):
    if(!empty($m_header_data->val->m_header_1)):
        $m_header_val = $m_header_data->val;
        $opts = array();
        if(!empty($m_header_data->opts)){
            foreach ($m_header_data->opts as $i => $v) {
                $opts[$v->name] = $v->val;
            }
        }
        $custom_background = false;
        extract(shortcode_atts(array(
            'background' 		=> 'white',

            'custom_background' 		    => '',
            'scroll_background' 		    => 'white',
            'scroll_custom_background' 		=> '#fff',
            'color' 	                   	=> 'dark-opacity-4',
            'scroll_color' 	                => '',
            'custom_color' 	            	=> '',
            'style' 		                => '',
            'line_color' 		            => 'gray-1',

        ), $opts));

        $customStyle = '';
        if(!empty($background&&$background=='custom')){
            if(!empty($custom_background)){
            $customStyle .= 'background: '.$custom_background.' !important;';
            }
        }

        if(!empty(get_post_field('pix-enable-mobile-sticky', $post))){
            if(get_post_field('pix-enable-mobile-sticky', $post)=='enable'){
                ?>
                <div class="pix-mobile-header-sticky w-100"></div>
                <?php
            }
        }   

        $col_opts = array();
        if(!empty($m_header_val->m_header_1->opts)){
            foreach ($m_header_val->m_header_1->opts as $i => $v) {
                $col_opts[$v->name] = $v->val;
            }
        }
        extract(shortcode_atts(array(
            'align' 		=> ''
        ), $col_opts));
        $align = pix_align_to_flex($align);

    ?>

    <header id="mobile_head" class="pix-header pix-header-mobile d-inline-block pix-header-normal pix-scroll-shadow sticky-top header-scroll2 bg-<?php echo esc_attr( $background ); ?>" style="<?php echo esc_attr($customStyle); ?>">
         <div class="container">
             <nav class="navbar navbar-hover-drop navbar-expand-lg2 navbar-light d-inline-block2 <?php echo esc_attr($align); ?>">
    				<?php
     				foreach ($m_header_val->m_header_1->val as $key => $value) {
                        pix_get_header_elem('m_header', $value, $opts);
     				}
    				?>
             </nav>
             <?php if($style=="border-bottom"): ?>
                 <div class="pix-header-border bg-<?php echo esc_attr( $line_color ); ?>" style="width:100%;height:1px;"></div>
             <?php endif; ?>
         </div>
         <?php if($style=="border-bottom-wide"): ?>
             <div class="pix-header-border bg-<?php echo esc_attr( $line_color ); ?>" style="width:100%;height:1px;"></div>
         <?php endif; ?>
     </header>
    <?php endif; ?>
<?php endif; ?>
