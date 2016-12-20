<?php

   $image_sizes = thr_get_image_sizes();
   $image_sizes_opt = array();
   $image_sizes_def = array();
   foreach($image_sizes as $id => $size){
        $image_sizes_opt[$id] = $size['title'];
        $image_sizes_def[$id] = true;
   }

   $sidebars_list = thr_get_sidebars_list(); 


  /* General */
  $this->sections[] = array(
                'icon'      => 'el-icon-wrench',
                'title'     => __('General', THEME_SLUG),
                'desc'     => __('These are general theme settings', THEME_SLUG),
                'fields'    => array(
                		
                	
                    
                    array(
            					'id' => 'add_sidebars',
				            	'type' => 'text',
				            	'class' => 'small-text',
				            	'title' => __('Additional sidebars', THEME_SLUG),
				            	'subtitle' => __('Specify number of additional sidebars you want to use in this theme. Manage your sidebars via <a href="'.admin_url('widgets.php').'">Appearance -> Widgets</a>', THEME_SLUG),
				            	'desc' => __('Note: Leave empty for no additional sidebars.', THEME_SLUG),
				            	'default' => 5,
				            	'validate' => 'numeric'
           					),
           			
                    array(
                        'id'        => 'default_fimg',
                        'type'      => 'media',
                        'url'       => true,
                        'title'     => __('Default featured image', THEME_SLUG),
                        'subtitle'      => __('Upload your default featured image which will be displayed for posts which don\'t have featured image set', THEME_SLUG),
                        'desc'  => __('Note: Allowed extensions are .jpg and .png', THEME_SLUG),
                        'default'   => array('url' => IMG_URI.'/throne_default.png'),
                    ),
                    
                    array(
                        'id'        => 'pagination_type',
                        'type'      => 'image_select',
                        'title'     => __('Pagination type', THEME_SLUG),
                        'subtitle'  => __('Choose how to navigate your blog pages', THEME_SLUG),
                        'options'   => array(
                            'prev_next' => array('title' => __('Previous/Next page links', THEME_SLUG), 'img' => ReduxFramework::$_url . 'assets/img/prev_next_style.png'),
                            'pagination' => array('title' => __('Numeric pagination links', THEME_SLUG),  'img' => ReduxFramework::$_url . 'assets/img/pagination_style.png')
                        ),
                        'default'   => 'pagination'
                    ),
                     
                    array(
                        'id'        => 'time_ago',
                        'type'      => 'switch',
                        'title'     => __('Display "time ago" format', THEME_SLUG),
                        'subtitle'  => __('Display post dates in "time ago" manner, like Twitter and Facebook (i.e 5 hours ago, 3 days ago, 2 weeks ago, 4 months ago, etc...)', THEME_SLUG),
                        'desc'  => __('Note: If you disable this option, you can choose your preffered date format in <a href="'.admin_url('options-general.php').'">Settings -> General</a>', THEME_SLUG),
                        'default'   => true
                    ),
                    
                     array(
                        'id'        => 'time_ago_limit',
                        'type'      => 'radio',
                        'title'     => __('Apply "time ago" to posts which are not older than', THEME_SLUG),
                        'options'   => array(
                            'hour' => __('1 Hour', THEME_SLUG),
                            'day' => __('1 Day', THEME_SLUG),
                            'week' => __('1 Week', THEME_SLUG),
                            'month' => __('1 Month', THEME_SLUG),
                            'three_months' => __('3 Months', THEME_SLUG),
                            'six_months' => __('6 Months', THEME_SLUG),
                            'year' => __('1 Year', THEME_SLUG),
                            '0' => __('Apply to all posts', THEME_SLUG),
                        ),
                        'default'   => 'three_months',
                        'required'  => array('time_ago', 'equals', true),
                    ),

                    array(
                        'id'        => 'social_share',
                        'type'      => 'sortable',
                        'mode'      => 'checkbox',
                        'title'     => __('Social share buttons', THEME_SLUG),
                        'subtitle'  => __('Check which social networks you want to use for sharing your posts', THEME_SLUG),
                        'options'   => array(
                            'facebook' => __('Facebook', THEME_SLUG),
                            'twitter' => __('Twitter', THEME_SLUG),
                            'gplus' => __('Google+', THEME_SLUG),
                            'pinterest' => __('Pinterest', THEME_SLUG),
                            'linkedin' => __('LinkedIN', THEME_SLUG)
                        ),
                        'default' => array(
                            'facebook' => 1,
                            'twitter' => 1,
                            'gplus' => 1,
                            'pinterest' => 1,
                            'linkedin' => 1
                        )
                    ),



                     array(
                        'id'        => 'scroll_to_top',
                        'type'      => 'switch',
                        'title'     => __('Display scroll to top button', THEME_SLUG),
                        'subtitle'  => __('Check if you want to display scroll to top button', THEME_SLUG),
                        'default'   => true
                    ),

                    array(
                        'id' => 'favicon',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Favicon', THEME_SLUG), 
                        'subtitle' => __('Upload your favicon here', THEME_SLUG),
                        'desc' => __('Supported formats: .ico .gif .png', THEME_SLUG),
                        'default' => array('url' => THEME_URI.'/favicon.ico')
                   ),
                   array(
                        'id' => 'apple_touch_icon',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Apple Touch Icon', THEME_SLUG), 
                        'subtitle' => __('Upload icon for the Apple touch', THEME_SLUG),
                        'desc' => __('Size: 77x77', THEME_SLUG),
                        'default'   => array('url' => '')
                        
                   ),
                   array(
                        'id' => 'metro_icon',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Metro Icon', THEME_SLUG), 
                        'subtitle' => __('Upload icon for the Metro interface', THEME_SLUG),
                        'desc' => __('Size: 144x144', THEME_SLUG),
                        'default'   => array('url' => '')
                   ),

                   array(
                        'id'        => 'responsive_mode',
                        'type'      => 'switch',
                        'title'     => __('Responsive mode', THEME_SLUG),
                        'subtitle'  => __('Check if you want to make this theme compatible with smart phones and tablets or always use fixed width', THEME_SLUG),
                        'default'   => true,
                        ),
                    
                    array(
                            'id' => 'rtl_mode',
                            'type' => 'switch',
                            'title' => __('RTL mode (right to left)', THEME_SLUG),
                            'subtitle' => __('Enable this option if you are using right to left writing/reading', THEME_SLUG),
                            'default' => false
                    ),

                    array(
                        'id'        => 'section_advanced',
                        'type'      => 'section',
                        'title'     => __('Advanced', THEME_SLUG),
                        'subtitle'  => __('These are options for advanced users only. Use it with caution', THEME_SLUG)
                    ),

                    array(
                        'id'        => 'image_sizes',
                        'type'      => 'checkbox',
                        'multi'     => true,
                        'title'     => __('Generate image sizes', THEME_SLUG),
                        'subtitle'  => __('Check what image sizes you want to generate (if you are not sure, it is highly recommended to leave all sizes checked)', THEME_SLUG),
                        'options'   => $image_sizes_opt,
                        'default'   => $image_sizes_def
                    ),

                    array(
                        'id'       => 'additional_css',
                        'type'     => 'ace_editor',
                        'title'    => __('Additional CSS', THEME_SLUG),
                        'subtitle' => __('Use this field to write or paste CSS code and modify default theme styling', THEME_SLUG),
                        'mode'     => 'css',
                        'theme'    => 'monokai',
                        'default'  => ''
                    ),

                    array(
                        'id'       => 'additional_js',
                        'type'     => 'ace_editor',
                        'title'    => __('Additional JavaScript', THEME_SLUG),
                        'subtitle' => __('Use this field to write or paste additional JavaScript code to this theme', THEME_SLUG),
                        'mode'     => 'javascript',
                        'theme'    => 'monokai',
                        'default'  => ''
                    ),

                    array(
                        'id'       => 'ga',
                        'type'     => 'ace_editor',
                        'title'    => __('Google Analytics tracking code', THEME_SLUG),
                        'subtitle' => __('Paste your google analytics tracking code (or any other javascript related tracking code)', THEME_SLUG),
                        'mode'     => 'text',
                        'theme'    => 'monokai',
                        'default'  => ''
                    )
                    
                    
                    
                  )
   );

  /* Header */
  $this->sections[] = array(
                'icon'      => ' el-icon-bookmark',
                'title'     => __('Header Styling', THEME_SLUG),
                'desc'     => __('These are options to modify and style your header area', THEME_SLUG),
                'fields'    => array(

                    array(
                        'id'        => 'header_main',
                        'type'      => 'image_select',
                        'title'     => __('Header layout', THEME_SLUG),
                        'subtitle'  => __('Choose a style for header area', THEME_SLUG),
                        'options'   => array(
                            '1' => array('title' => __('Logo <span>(left)</span> navigation <span>(right)</span>', THEME_SLUG),  'img' => ReduxFramework::$_url . 'assets/img/logo_a.png'),
                            '2' => array('title' => __('Logo <span>(top left)</span> ad space <span>(top right)</span> navigation <span>(bottom)</span>', THEME_SLUG),   'img' => ReduxFramework::$_url . 'assets/img/logo_b.png'),
                            '3' => array('title' => __('Logo <span>(top center)</span> navigation <span>(bottom center)</span>', THEME_SLUG),  'img' => ReduxFramework::$_url . 'assets/img/logo_c.png')
                        ),
                        'default'   => 1
                    ),

                    array(
                        'id'        => 'sticky_header',
                        'type'      => 'switch',
                        'title'     => __('Sticky header', THEME_SLUG),
                        'subtitle'  => __('Check if you want to make main navigation always visible (sticky)', THEME_SLUG),
                        'default'   => true,
                    ),


                    array(
                        'id' => 'header_height',
                        'type' => 'text',
                        'class' => 'small-text',
                        'title' => __('Header height', THEME_SLUG),
                        'subtitle' => __('Specify height for youe header area', THEME_SLUG),
                        'desc' => __('Note: Height value is in px.', THEME_SLUG),
                        'default' => 82,
                        'validate' => 'numeric'
                    ),


                    array(
                        'id'        => 'logo',
                        'type'      => 'media',
                        'url'       => true,
                        'title'     => __('Logo', THEME_SLUG),
                        'subtitle'      => __('Upload your logo image here, or leave empty to show website title instead', THEME_SLUG),
                        'desc'  => __('Note: Allowed extensions are .jpg, .png and .gif', THEME_SLUG),
                        'default'   => array('url' => IMG_URI.'/throne_logo.png'),
                    ),

                    array(
                        'id' => 'logo_position',
                        'type' => 'spacing',
                        'title' => __('Logo position', THEME_SLUG), 
                        'subtitle' => __('Specify left and top positions for your logo placement inside header', THEME_SLUG),
                        'top' => false,
                        'left' => false,
                        'default'            => array(
                            'padding-bottom'     => '12', 
                            'padding-right'   => '0'
                        )
                    ),

                    array(
                            'id' => 'header_ad',
                            'type' => 'editor',
                            'title' => __('Header as space', THEME_SLUG),
                            'subtitle' => __('This is a place for header banner ad', THEME_SLUG),
                            'default' => '',
                            'desc' => __('Note: If you want to paste HTML or js code, use "text" mode in editor. Suggested size of an ad banner is 728x90', THEME_SLUG),
                            'args'   => array(
                                'textarea_rows'    => 5
                            ),
                            'required' => array('header_main', '=', '2')
                    ),

                    array(
                        'id' => 'color_header_bg',
                        'type' => 'color',
                        'title' => __('Background color', THEME_SLUG),
                        'subtitle' => __('Specify header background color', THEME_SLUG),
                        'transparent' => false,
                        'default' => '#222222'
                    ),

                    array(
                        'id' => 'header_bg_opacity',
                        'type' => 'slider',
                        'title' => __('Background color opacity', THEME_SLUG),
                        'subtitle' => __('Specify header background color opacity', THEME_SLUG),
                        'min' => 0.0,
                        'max' => 1.0,
                        'step' => 0.01,
                        'resolution' => 0.01,
                        'default' => 1.0
                    ),

                    array(
                        'id'        => 'header_bg_img',
                        'type'      => 'media',
                        'url'       => true,
                        'title'     => __('Header background image', THEME_SLUG),
                        'subtitle'      => __('Header background image', THEME_SLUG),
                        'default'   => array('url' => ''),
                    ),

                    array(
                        'id'        => 'header_bg_pat',
                        'type'      => 'media',
                        'url'       => true,
                        'title'     => __('Header background pattern', THEME_SLUG),
                        'subtitle'      => __('Header background pattern', THEME_SLUG),
                        'default'   => array('url' => ''),
                    ),

                    array(
                        'id' => 'color_header_bottom_bg',
                        'type' => 'color',
                        'title' => __('Bottom background color', THEME_SLUG),
                        'subtitle' => __('Specify background color for bottom header area', THEME_SLUG),
                        'transparent' => false,
                        'default' => '#ffffff',
                        'required' => array('header_main', '!=', '1')
                    ),

                    array(
                        'id' => 'color_header_txt',
                        'type' => 'color',
                        'title' => __('Text color', THEME_SLUG),
                        'subtitle' => __('This is color for navigation and text inside header', THEME_SLUG),
                        'transparent' => false,
                        'default' => '#ffffff'
                    ),

                    array(
                        'id' => 'color_header_acc',
                        'type' => 'color',
                        'title' => __('Accent color', THEME_SLUG),
                        'subtitle' => __('This is color for navigation hover and details', THEME_SLUG),
                        'transparent' => false,
                        'default' => '#e23a3e'
                    ),


                    

                   array(
                        'id'        => 'header_description',
                        'type'      => 'switch',
                        'title'     => __('Display site description', THEME_SLUG),
                        'subtitle'  => __('Check if you want to display site description (below logo/title)', THEME_SLUG),
                        'desc'  => __('Note: You can specify your site description inside <a href="'.admin_url('options-general.php').'">Settings -> General</a>', THEME_SLUG),
                        'default'   => false,
                    ),

                   array(
                        'id'        => 'header_search',
                        'type'      => 'switch',
                        'title'     => __('Display search', THEME_SLUG),
                        'subtitle'  => __('Check if you want to display search icon', THEME_SLUG),
                        'default'   => true,
                    )

                )
    );

    /* Body */
  $this->sections[] = array(
                'icon'      => 'el-icon-screen',
                'title'     => __('Body Styling', THEME_SLUG),
                'desc'     => __('These are options to modify and style your body area', THEME_SLUG),
                'fields'    => array(
                    
                    array(
                        'id'        => 'body_style',
                        'type'      => 'image_select',
                        'title'     => __('Body style', THEME_SLUG),
                        'subtitle'  => __('Choose body style/layout ', THEME_SLUG),
                        'options'   => array(
                            'boxed' => array('title' => __('Boxed', THEME_SLUG), 'img' => ReduxFramework::$_url . 'assets/img/body_boxed.png'),
                            'default' => array('title' => __('Wide', THEME_SLUG),  'img' => ReduxFramework::$_url . 'assets/img/body_wide.png'),
                        ),
                        'default'   => 'default'
                    ),

                    array(
                        'id' => 'color_body_bg',
                        'type' => 'color',
                        'title' => __('Background color', THEME_SLUG),
                        'subtitle' => __('Specify body background color', THEME_SLUG),
                        'transparent' => false,
                        'default' => '#f3f3f3'
                    ),

                    array(
                        'id' => 'body_bg_opacity',
                        'type' => 'slider',
                        'title' => __('Background color opacity', THEME_SLUG),
                        'subtitle' => __('Specify body background color opacity (if you are using color overlay for background image)', THEME_SLUG),
                        'min' => 0.0,
                        'max' => 1.0,
                        'step' => 0.01,
                        'resolution' => 0.01,
                        'default' => 1.0
                    ),

                    array(
                        'id'        => 'body_bg_img',
                        'type'      => 'media',
                        'url'       => true,
                        'title'     => __('Body background image', THEME_SLUG),
                        'subtitle'      => __('Upload body background image', THEME_SLUG),
                        'default'   => array('url' => ''),
                    ),

                    array(
                        'id'        => 'body_bg_pat',
                        'type'      => 'media',
                        'url'       => true,
                        'title'     => __('Body background pattern', THEME_SLUG),
                        'subtitle'      => __('Upload body background pattern', THEME_SLUG),
                        'default'   => array('url' => ''),
                    ),

                    array(
                        'id' => 'color_body_boxed_bg',
                        'type' => 'color',
                        'title' => __('Boxed body area background color', THEME_SLUG),
                        'subtitle' => __('Specify background color for boxed (inner) body area', THEME_SLUG),
                        'transparent' => false,
                        'default' => '#ffffff',
                        'required' => array('body_style', '=', 'boxed')
                    ),

                    array(
                        'id' => 'body_top_margin',
                        'type' => 'spacing',
                        'title' => __('Body top margin', THEME_SLUG),
                        'subtitle' => __('Check if you want to separate your body area from top (on boxed layout)', THEME_SLUG),
                        'top' => false,
                        'left' => false,
                        'right' => false,
                        'default'            => array(
                            'padding-bottom'     => '0',
                        ),

                        'required' => array('body_style', '=', 'boxed')
                   )
                )
    );

     /* Content */
  $this->sections[] = array(
                'icon'      => 'el-icon-file',
                'title'     => __('Content Styling', THEME_SLUG),
                'desc'     => __('These are options to modify and style your main content area', THEME_SLUG),
                'fields'    => array(

                    array(
                        'id'        => 'main_content_style',
                        'type'      => 'image_select',
                        'title'     => __('Content style', THEME_SLUG),
                        'subtitle'  => __('Choose a style for your main content area (post, pages, archives content, etc...)', THEME_SLUG),
                        'options'   => array(
                            'thr_content_wrapped' => array('title' => __('Wrapped', THEME_SLUG), 'img' => ReduxFramework::$_url . 'assets/img/content_wrapped.png'),
                            'default' => array('title' => __('Unwrapped', THEME_SLUG),  'img' => ReduxFramework::$_url . 'assets/img/content_unwrapped.png'),
                        ),
                        'default'   => 'thr_content_wrapped'
                    ),

                    array(
                        'id' => 'color_content_bg',
                        'type' => 'color',
                        'title' => __('Background color', THEME_SLUG),
                        'subtitle' => __('Specify content background color', THEME_SLUG),
                        'transparent' => false,
                        'default' => '#ffffff',
                        'required' => array('main_content_style', '=', 'thr_content_wrapped')
                    ),

                    array(
                        'id' => 'color_content_acc',
                        'type' => 'color',
                        'title' => __('Accent color', THEME_SLUG),
                        'subtitle' => __('This color will apply to buttons, links, icons, etc...', THEME_SLUG),
                        'transparent' => false,
                        'default' => '#e23a3e'
                    ),

                    array(
                        'id' => 'color_content_txt_h',
                        'type' => 'color',
                        'title' => __('Headings text color', THEME_SLUG),
                        'subtitle' => __('This color will apply to your post titles, headings, etc...', THEME_SLUG),
                        'transparent' => false,
                        'default' => '#333333'
                    ),

                    array(
                        'id' => 'color_content_txt',
                        'type' => 'color',
                        'title' => __('Text color', THEME_SLUG),
                        'subtitle' => __('This is common content text color', THEME_SLUG),
                        'transparent' => false,
                        'default' => '#444444'
                    ),

                    array(
                        'id' => 'color_content_meta',
                        'type' => 'color',
                        'title' => __('Meta text color', THEME_SLUG),
                        'subtitle' => __('This color will apply to your meta data (secondary text)', THEME_SLUG),
                        'transparent' => false,
                        'default' => '#444444'
                    )
                 
                 )
  );

 
 /* Sidebar */
  
    $this->sections[] = array(
                'icon'      => 'el-icon-th-list',
                'title'     => __('Sidebar Styling', THEME_SLUG),
                'desc'     => __('These are global styling settings', THEME_SLUG),
                'fields'    => array(

                    array(
                        'id'        => 'sidebar_style',
                        'type'      => 'image_select',
                        'title'     => __('Sidebar style', THEME_SLUG),
                        'subtitle'  => __('Choose a style for your sidebar area', THEME_SLUG),
                        'options'   => array(
                            'default' => array('title' => __('Unwrapped', THEME_SLUG),  'img' => ReduxFramework::$_url . 'assets/img/sidebar_unwrapped.png'),
                            'thr_sidebar_wrapped' => array('title' => __('Wrapped', THEME_SLUG), 'img' => ReduxFramework::$_url . 'assets/img/sidebar_wrapped.png'),
                            'thr_widget_wrapped' => array('title' => __('Widgets Wrapped', THEME_SLUG), 'img' => ReduxFramework::$_url . 'assets/img/sidebar_widgets_wrapped.png'),
                        ),
                        'default'   => 'thr_widget_wrapped'
                    ),

                    array(
                        'id' => 'color_sidebar_bg',
                        'type' => 'color',
                        'title' => __('Background color', THEME_SLUG),
                        'subtitle' => __('Specify sidebar background color', THEME_SLUG),
                        'transparent' => false,
                        'default' => '#ffffff',
                        'required' => array('sidebar_style', '!=', 'default')
                    ),

                    array(
                        'id' => 'color_sidebar_acc',
                        'type' => 'color',
                        'title' => __('Accent color', THEME_SLUG),
                        'subtitle' => __('This color will apply to buttons, links, icons, etc...', THEME_SLUG),
                        'transparent' => false,
                        'default' => '#e23a3e'
                    ),

                    array(
                        'id' => 'color_sidebar_txt_h',
                        'type' => 'color',
                        'title' => __('Headings text color', THEME_SLUG),
                        'subtitle' => __('This color will apply to your widget tiles, headings, etc...', THEME_SLUG),
                        'transparent' => false,
                        'default' => '#333333'
                    ),

                    array(
                        'id' => 'color_sidebar_txt',
                        'type' => 'color',
                        'title' => __('Text color', THEME_SLUG),
                        'subtitle' => __('This is common text sidebar color', THEME_SLUG),
                        'transparent' => false,
                        'default' => '#444444'
                    )
                    
                )
    );

    /* Footer */
  
    $this->sections[] = array(
                    'icon'      => 'el-icon-bookmark-empty',
                    'title'     => __('Footer Styling', THEME_SLUG),
                    'desc'     => __('Manage settings for footer area', THEME_SLUG),
                    'fields'    => array(
                
                       array(
                            'id' => 'footer_display',
                            'type' => 'switch',
                            'switch' => true,
                            'title' => __('Enable Footer', THEME_SLUG),
                            'desc' => __('Check if you want to include footer area in your theme. You can manage footer area content in <a href="'.admin_url('widgets.php').'">Apperance -> Widgets</a> settings.', THEME_SLUG),
                            'default' => true
                        ),
                                        
                        array(
                            'id'        => 'footer_columns',
                            'type'      => 'image_select',
                            'title'     => __('Footer Columns', THEME_SLUG),
                            'subtitle'  => __('Choose number of columns in footer area', THEME_SLUG),
                            'desc'  => __('Note: This represents number of widgets that will fit in one row of your footer sidebar', THEME_SLUG),
                            'options'   => array(
                                'one-half' => array('title' => __('2 Columns', THEME_SLUG),       'img' => ReduxFramework::$_url . 'assets/img/footer_2col.png'),
                                'one-third' => array('title' => __('3 Columns', THEME_SLUG),  'img' => ReduxFramework::$_url . 'assets/img/footer_3col.png'),
                                'one-quarter' => array('title' => __('4 Columns', THEME_SLUG), 'img' => ReduxFramework::$_url . 'assets/img/footer_4col.png'),
                            ),
                            'default'   => 'one-third',
                            'required' => array('footer_display', '=', true)
                        ),
                        
                        array(
                            'id' => 'color_footer_bg',
                            'type' => 'color',
                            'title' => __('Background color', THEME_SLUG),
                            'subtitle' => __('Specify footer background color', THEME_SLUG),
                            'transparent' => false,
                            'default' => '#333333',
                            'required' => array('footer_display', '=', true)
                        ),

                        array(
                            'id' => 'color_footer_acc',
                            'type' => 'color',
                            'title' => __('Accent color', THEME_SLUG),
                            'subtitle' => __('This color will apply to buttons, links, icons, etc...', THEME_SLUG),
                            'transparent' => false,
                            'default' => '#e23a3e',
                            'required' => array('footer_display', '=', true)
                        ),

                        array(
                            'id' => 'color_footer_txt_h',
                            'type' => 'color',
                            'title' => __('Headings text color', THEME_SLUG),
                            'subtitle' => __('This color will apply to your post tiles, headings, etc...', THEME_SLUG),
                            'transparent' => false,
                            'default' => '#ffffff',
                             'required' => array('footer_display', '=', true)
                        ),

                        array(
                            'id' => 'color_footer_txt',
                            'type' => 'color',
                            'title' => __('Text color', THEME_SLUG),
                            'subtitle' => __('This is common text footer color', THEME_SLUG),
                            'transparent' => false,
                            'default' => '#d8d8d8',
                            'required' => array('footer_display', '=', true)
                        ),
                        
                        array(
                            'id' => 'enable_copyright',
                            'type' => 'switch',
                            'title' => __('Enable sub-footer/copyright area', THEME_SLUG),
                            'subtitle' => __('Check if you want to include copyright area below footer',THEME_SLUG),
                            'default' => true
                        ),

                        array(
                            'id' => 'footer_copyright',
                            'type' => 'editor',
                            'title' => __('Copyright', THEME_SLUG),
                            'subtitle' => __('Specify some copyright text to show at the bottom of the website', THEME_SLUG),
                            'default' => __('Copyright &copy; 2014. Created by <a href="http://mekshq.com" target="_blank">Meks</a>. Powered by <a href="http://www.wordpress.org" target="_blank">WordPress</a>.', THEME_SLUG),
                            'args'   => array(
                                'textarea_rows'    => 3                            ),
                            'required' => array('enable_copyright', '=', true)
                        ),
                        array(
                            'id' => 'enable_footer_menu',
                            'type' => 'switch',
                            'title' => __('Enable sub-footer menu', THEME_SLUG),
                            'subtitle' => __('Check if you want to include sub-footer menu inside copyright area', THEME_SLUG),
                            'default' => true,
                            'required' => array('enable_copyright', '=', true)
                        )



                        

                    
                  )
   );
    
    /* Layout settings */
  
    $this->sections[] = array(
                'icon'      => 'el-icon-th-large',
                'title'     => __('Main Layouts', THEME_SLUG),
                'desc'     => __('These are general options for your content layouts. You can connect each of these layouts to a specific archive template.', THEME_SLUG),
                'fields'    => array(
                    
                    array(
                        'id'        => 'section_featured_area',
                        'type'      => 'section',
                        'title'     => __('Featured Area', THEME_SLUG),
                        'subtitle'  => __('Manage general options for top Featured Area', THEME_SLUG)
                    ),

                    array(
                        'id' => 'lay_fa_title_limit',
                        'type' => 'text',
                        'class' => 'small-text',
                        'title' => __('Post titles limit', THEME_SLUG),
                        'subtitle' => __('Specify number of characters to limit post titles for featured area', THEME_SLUG),
                        'desc' => __('Note: Value represents number of characters. Leave empty if you want to show full titles.', THEME_SLUG),
                        'default' => 70,
                        'validate' => 'numeric'
                    ),

                    array(
                        'id' => 'lay_fa_title_more',
                        'type' => 'text',
                        'class' => 'small-text',
                        'title' => __('Title more string', THEME_SLUG),
                        'subtitle' => __('Specify your "more" string to append after stripped titles', THEME_SLUG),
                        'default' => '...',
                        'validate' => 'no_html'
                    ),

                    array(
                        'id'        => 'lay_fa_meta',
                        'type'      => 'sortable',
                        'mode'      => 'checkbox',
                        'title'     => __('Meta data', THEME_SLUG),
                        'subtitle'  => __('Check which meta data to show for featured area posts', THEME_SLUG),
                        'options'   => array(
                            'date' => __('Date/time', THEME_SLUG),
                            'author' => __('Author', THEME_SLUG),
                            'categories' => __('Categories', THEME_SLUG),
                            'comments' => __('Comments', THEME_SLUG)
                        ),
                        'default' => array(
                            'date' => 1,
                            'author' => 0,
                            'categories' => 0,
                            'comments' => 0
                        )
                    ),

                    array(
                        'id'        => 'featured_area_hover',
                        'type'      => 'switch',
                        'title'     => __('Display featured area hover effect (with excerpt)', THEME_SLUG),
                        'subtitle'  => __('Check if you want to display hover effect for featured area items to display excerpt below', THEME_SLUG),
                        'default'   => true
                    ),

                    array(
                        'id' => 'lay_fa_excerpt_limit',
                        'type' => 'text',
                        'class' => 'small-text',
                        'title' => __('Excerpt limit', THEME_SLUG),
                        'subtitle' => __('Specify your post excerpt limit for featured area', THEME_SLUG),
                        'desc' => __('Note: Value represents number of characters', THEME_SLUG),
                        'default' => 130,
                        'validate' => 'numeric',
                        'required'  => array('featured_area_hover', '=', true)
                    ),
                    
                    array(
                        'id' => 'lay_fa_excerpt_more',
                        'type' => 'text',
                        'class' => 'small-text',
                        'title' => __('Excerpt more string', THEME_SLUG),
                        'subtitle' => __('Specify your excerpt "more" string', THEME_SLUG),
                        'default' => '...',
                        'required'  => array('featured_area_hover', '=', true)
                     ),
                    array(
                        'id' => 'lay_fa_rm',
                        'type' => 'switch',
                        'title' => __('Display "read more"', THEME_SLUG),
                        'subtitle' => __('Check if you want to display read more button on featured area items', THEME_SLUG),
                        'default' => true,
                        'required'  => array('featured_area_hover', '=', true)
                     ),

                    array(
                        'id'        => 'section_layout_a',
                        'type'      => 'section',
                        'title'     => __('Layout A', THEME_SLUG),
                        'subtitle'  => __('Manage options for layout A', THEME_SLUG)
                    ),

                    /*
                    array(
                        'id' => 'lay_a_ppp_limit',
                        'type' => 'text',
                        'class' => 'small-text',
                        'title' => __('Number of posts per page', THEME_SLUG),
                        'subtitle' => __('Specify how many posts per page to display on layout A', THEME_SLUG),
                        'default' => get_option('posts_per_page'),
                        'validate' => 'numeric'
                    ),
                    */

                    array(
                        'id'        => 'lay_a_meta',
                        'type'      => 'sortable',
                        'mode'      => 'checkbox',
                        'title'     => __('Meta data', THEME_SLUG),
                        'subtitle'  => __('Check which meta data to show for posts in layout A', THEME_SLUG),
                        'options'   => array(
                            'date' => __('Date/time', THEME_SLUG),
                            'author' => __('Author', THEME_SLUG),
                            'categories' => __('Categories', THEME_SLUG),
                            'comments' => __('Comments', THEME_SLUG)
                        ),
                        'default' => array(
                            'date' => 1,
                            'author' => 1,
                            'categories' => 1,
                            'comments' => 1
                        )
                    ),

                    array(
                        'id' => 'lay_a_fimg',
                        'type' => 'switch',
                        'title' => __('Display featured image', THEME_SLUG),
                        'subtitle' => __('Check if you want to display featured image for posts in layout A', THEME_SLUG),
                        'default' => true
                     ),


                    array(
                        'id' => 'lay_a_content_type',
                        'type' => 'radio',
                        'title' => __('Post content display', THEME_SLUG),
                        'subtitle' => __('Choose how to display post content for layout A', THEME_SLUG),
                        'options' => array(
                            'content' => __('Full Content (optionally split with "<--more-->" tag)', THEME_SLUG),
                            'excerpt' =>  __('Excerpt', THEME_SLUG)
                        ),
                        'default' => 'content'
                     ),

                    array(
                        'id' => 'lay_a_excerpt_limit',
                        'type' => 'text',
                        'class' => 'small-text',
                        'title' => __('Excerpt limit', THEME_SLUG),
                        'subtitle' => __('Specify your excerpt limit if you are using excerpts on blog posts', THEME_SLUG),
                        'desc' => __('Note: Value represents number of characters', THEME_SLUG),
                        'default' => '350',
                        'validate' => 'numeric',
                        'required'  => array('lay_a_content_type', 'equals', 'excerpt')
                    ),

                    array(
                        'id' => 'lay_a_excerpt_more',
                        'type' => 'text',
                        'class' => 'small-text',
                        'title' => __('Excerpt more string', THEME_SLUG),
                        'subtitle' => __('Specify your excerpt "more" string if you want to override default string "..."', THEME_SLUG),
                        'default' => '...',
                        'required'  => array('lay_a_content_type', 'equals', 'excerpt')
                     ),

                    array(
                        'id' => 'lay_a_rm',
                        'type' => 'switch',
                        'title' => __('Display "read more" button', THEME_SLUG),
                        'subtitle' => __('Check if you want to display read more button for posts in layout A', THEME_SLUG),
                        'default' => true
                     ),

                    array(
                        'id' => 'lay_a_share',
                        'type' => 'switch',
                        'title' => __('Display share buttons', THEME_SLUG),
                        'subtitle' => __('Check if you want to display social share buttons for posts in layout A', THEME_SLUG),
                        'default' => true
                     ),

                    array(
                        'id'        => 'section_layout_b',
                        'type'      => 'section',
                        'title'     => __('Layout B', THEME_SLUG),
                        'subtitle'  => __('Manage options for layout B', THEME_SLUG)
                    ),

                    /*
                    array(
                        'id' => 'lay_b_ppp_limit',
                        'type' => 'text',
                        'class' => 'small-text',
                        'title' => __('Number of posts per page', THEME_SLUG),
                        'subtitle' => __('Specify how many posts per page to display on layout B', THEME_SLUG),
                        'default' => get_option('posts_per_page'),
                        'validate' => 'numeric'
                    ),
                    */

                    array(
                        'id' => 'lay_b_title_limit',
                        'type' => 'text',
                        'class' => 'small-text',
                        'title' => __('Post titles limit', THEME_SLUG),
                        'subtitle' => __('Specify number of characters to limit post titles for layout B', THEME_SLUG),
                        'desc' => __('Note: Value represents number of characters. Leave empty if you want to show full titles.', THEME_SLUG),
                        'default' => '55',
                        'validate' => 'numeric'
                    ),

                    array(
                        'id' => 'lay_b_title_more',
                        'type' => 'text',
                        'class' => 'small-text',
                        'title' => __('Title more string', THEME_SLUG),
                        'subtitle' => __('Specify your "more" string to append after stripped titles', THEME_SLUG),
                        'default' => '...',
                        'validate' => 'no_html'
                    ),

                    array(
                        'id'        => 'lay_b_meta',
                        'type'      => 'sortable',
                        'mode'      => 'checkbox',
                        'title'     => __('Meta data', THEME_SLUG),
                        'subtitle'  => __('Check which meta data to show for layout B', THEME_SLUG),
                        'options'   => array(
                            'date' => __('Date/time', THEME_SLUG),
                            'author' => __('Author', THEME_SLUG),
                            'categories' => __('Categories', THEME_SLUG),
                            'comments' => __('Comments', THEME_SLUG)
                        ),
                        'default' => array(
                            'date' => 1,
                            'author' => 0,
                            'categories' => 0,
                            'comments' => 1
                        )
                    ),

                    array(
                        'id' => 'lay_b_excerpt_limit',
                        'type' => 'text',
                        'class' => 'small-text',
                        'title' => __('Excerpt limit', THEME_SLUG),
                        'subtitle' => __('Specify your post excerpt limit for layout B', THEME_SLUG),
                        'desc' => __('Note: Value represents number of characters', THEME_SLUG),
                        'default' => '190',
                        'validate' => 'numeric'
                    ),
                    
                    array(
                        'id' => 'lay_b_excerpt_more',
                        'type' => 'text',
                        'class' => 'small-text',
                        'title' => __('Excerpt more string', THEME_SLUG),
                        'subtitle' => __('Specify your excerpt "more" string if you want to override default string "..."', THEME_SLUG),
                        'default' => '...'
                     ),

                    array(
                        'id' => 'lay_b_rm',
                        'type' => 'switch',
                        'title' => __('Display "read more" button', THEME_SLUG),
                        'subtitle' => __('Check if you want to display read more button for posts in layout B', THEME_SLUG),
                        'default' => true
                     ),

                    array(
                        'id' => 'lay_b_share',
                        'type' => 'switch',
                        'title' => __('Display share buttons', THEME_SLUG),
                        'subtitle' => __('Check if you want to display social share buttons for posts in layout B', THEME_SLUG),
                        'default' => false
                     ),

                    array(
                        'id'        => 'section_layout_c',
                        'type'      => 'section',
                        'title'     => __('Layout C', THEME_SLUG),
                        'subtitle'  => __('Manage options for layout C', THEME_SLUG)
                    ),

                    /*
                    array(
                        'id' => 'lay_c_ppp_limit',
                        'type' => 'text',
                        'class' => 'small-text',
                        'title' => __('Number of posts per page', THEME_SLUG),
                        'subtitle' => __('Specify how many posts per page to display on layout C', THEME_SLUG),
                        'default' => get_option('posts_per_page'),
                        'validate' => 'numeric'
                    ),
                    */

                    array(
                        'id' => 'lay_c_title_limit',
                        'type' => 'text',
                        'class' => 'small-text',
                        'title' => __('Post titles limit', THEME_SLUG),
                        'subtitle' => __('Specify number of characters to limit post titles for layout C', THEME_SLUG),
                        'desc' => __('Note: Value represents number of characters. Leave empty if you want to show full titles.', THEME_SLUG),
                        'default' => '45',
                        'validate' => 'numeric'
                    ),

                    array(
                        'id' => 'lay_c_title_more',
                        'type' => 'text',
                        'class' => 'small-text',
                        'title' => __('Title more string', THEME_SLUG),
                        'subtitle' => __('Specify your "more" string to append after stripped titles', THEME_SLUG),
                        'default' => '...',
                        'validate' => 'no_html'
                    ),

                    array(
                        'id'        => 'lay_c_meta',
                        'type'      => 'sortable',
                        'mode'      => 'checkbox',
                        'title'     => __('Meta data', THEME_SLUG),
                        'subtitle'  => __('Check which meta data to show for layout C', THEME_SLUG),
                        'options'   => array(
                            'date' => __('Date/time', THEME_SLUG),
                            'author' => __('Author', THEME_SLUG),
                            'categories' => __('Categories', THEME_SLUG),
                            'comments' => __('Comments', THEME_SLUG)
                        ),
                        'default' => array(
                            'date' => 1,
                            'author' => 0,
                            'categories' => 0,
                            'comments' => 1
                        )
                    ),

                    array(
                        'id' => 'lay_c_excerpt_limit',
                        'type' => 'text',
                        'class' => 'small-text',
                        'title' => __('Excerpt limit', THEME_SLUG),
                        'subtitle' => __('Specify your post excerpt limit for layout C', THEME_SLUG),
                        'desc' => __('Note: Value represents number of characters', THEME_SLUG),
                        'default' => '245',
                        'validate' => 'numeric'
                    ),
                    
                    array(
                        'id' => 'lay_c_excerpt_more',
                        'type' => 'text',
                        'class' => 'small-text',
                        'title' => __('Excerpt more string', THEME_SLUG),
                        'subtitle' => __('Specify your excerpt "more" string if you want to override default string "..."', THEME_SLUG),
                        'default' => '...'
                     ),

                    array(
                        'id' => 'lay_c_rm',
                        'type' => 'switch',
                        'title' => __('Display "read more" button', THEME_SLUG),
                        'subtitle' => __('Check if you want to display read more button for posts in layout C', THEME_SLUG),
                        'default' => true
                     ),

                    array(
                        'id' => 'lay_c_share',
                        'type' => 'switch',
                        'title' => __('Display share buttons', THEME_SLUG),
                        'subtitle' => __('Check if you want to display social share buttons for posts in layout C', THEME_SLUG),
                        'default' => false
                     ),
                    
                    array(
                        'id'        => 'section_layout_d',
                        'type'      => 'section',
                        'title'     => __('Layout D', THEME_SLUG),
                        'subtitle'  => __('Manage options for layout D', THEME_SLUG)
                    ),

                    /*
                    array(
                        'id' => 'lay_d_ppp_limit',
                        'type' => 'text',
                        'class' => 'small-text',
                        'title' => __('Number of posts per page', THEME_SLUG),
                        'subtitle' => __('Specify how many posts per page to display on layout D', THEME_SLUG),
                        'default' => get_option('posts_per_page'),
                        'validate' => 'numeric'
                    ),
                    */

                    array(
                        'id' => 'lay_d_title_limit',
                        'type' => 'text',
                        'class' => 'small-text',
                        'title' => __('Post titles limit', THEME_SLUG),
                        'subtitle' => __('Specify number of characters to limit post titles for layout D', THEME_SLUG),
                        'desc' => __('Note: Value represents number of characters. Leave empty if you want to show full titles.', THEME_SLUG),
                        'default' => '40',
                        'validate' => 'numeric'
                    ),

                    array(
                        'id' => 'lay_d_title_more',
                        'type' => 'text',
                        'class' => 'small-text',
                        'title' => __('Title more string', THEME_SLUG),
                        'subtitle' => __('Specify your "more" string to append after stripped titles', THEME_SLUG),
                        'default' => '...',
                        'validate' => 'no_html'
                    ),

                    array(
                        'id'        => 'lay_d_meta',
                        'type'      => 'sortable',
                        'mode'      => 'checkbox',
                        'title'     => __('Meta data', THEME_SLUG),
                        'subtitle'  => __('Check which meta data to show for layout D', THEME_SLUG),
                        'options'   => array(
                            'date' => __('Date/time', THEME_SLUG),
                            'author' => __('Author', THEME_SLUG),
                            'categories' => __('Categories', THEME_SLUG),
                            'comments' => __('Comments', THEME_SLUG)
                        ),
                        'default' => array(
                            'date' => 1,
                            'author' => 0,
                            'categories' => 0,
                            'comments' => 0
                        )
                    )

                  )
   );

   /* Home Page */
  
	$this->sections[] = array(
                'icon'      => 'el-icon-home',
                'title'     => __('Home Page', THEME_SLUG),
                'desc'     => __('Manage your home page settings. In order to use these settings properly, you need to create <strong>Home Page template</strong> and use it with "front page displays static page" option in <a href="'.admin_url('options-reading.php').'">Settings -> Reading</a>', THEME_SLUG),
                'fields'    => array(
                    
                    array(
                        'id'        => 'home_featured_area',
                        'type'      => 'switch',
                        'title'     => __('Display featured area', THEME_SLUG),
                        'subtitle'  => __('Check if you want to enable featured area on home page', THEME_SLUG),
                        'default'   => true
                    ),
                    
                    array(
                        'id'        => 'home_fa_layout',
                        'type'      => 'image_select',
                        'title'     => __('Featured area layout', THEME_SLUG),
                        'subtitle'  => __('Choose a layout for your featured area on home page', THEME_SLUG),
                        'options'   => thr_featured_area_layouts(),
                        'default'   => '3_4',
                        'required' => array('home_featured_area', '=', true)
                    ),

                    array(
                        'id'        => 'home_fa_posts_order',
                        'type'      => 'radio',
                        'title'     => __('Featured area displays', THEME_SLUG),
                        'subtitle'  => __('Choose which posts to display on home page featured area', THEME_SLUG),
                        'options'   => array(
                            'date' => __('Latest posts', THEME_SLUG),
                            'comment_count' => __('Most popular posts (most commented)', THEME_SLUG),
                            'rand' => __('Random posts', THEME_SLUG),
                            'manual' => __('Manualy picked posts', THEME_SLUG)
                            ),
                        'default'   => 'date',
                        'required' => array('home_featured_area', '=', true)
                    ),

                    array(
                        'id'        => 'home_fa_posts_cat',
                        'type'      => 'select',
                        'data'      => 'categories',
                        'multi'     => true,
                        'title'     => __('In category', THEME_SLUG),
                        'subtitle'  => __('Check if you want to display posts in featured area only from specific category(s)', THEME_SLUG),
                        'desc'      => __('Note: You can select one or more categories. Leave empty for "all categories"', THEME_SLUG),
                        'required' => array('home_fa_posts_order', '!=', 'manual')
                    ),

                    array(
                        'id'        => 'home_fa_posts_tag',
                        'type'      => 'select',
                        'data'      => 'tags',
                        'multi'     => true,
                        'title'     => __('Tagged with', THEME_SLUG),
                        'subtitle'  => __('Check if you want to display posts in featured area only from specific tag(s)', THEME_SLUG),
                        'desc'      => __('Note: You can select one or more tags. Leave empty for "all tags"', THEME_SLUG),
                        'required' => array('home_fa_posts_order', '!=', 'manual')
                    ),

                    array(
                        'id'        => 'home_fa_posts_manual',
                        'type'      => 'select',
                        'data'      => 'post',
                        'multi'     => true,
                        'sortable'     => true,
                        'title'     => __('Choose posts', THEME_SLUG),
                        'subtitle'  => __('Pick your featured area posts manually', THEME_SLUG),
                        'desc'      => __('Note: Please keep in mind that number of picked posts must match your layout limit (i.e. if you are using 3+4 layout, choose 7 posts)', THEME_SLUG),
                        'required' => array('home_fa_posts_order', '=', 'manual'),
                        'args' => array('posts_per_page' => 100) 
                    ),

                    array(
                        'id'        => 'home_do_not_duplicate',
                        'type'      => 'switch',
                        'title'     => __('Do not duplicate', THEME_SLUG),
                        'subtitle'  => __('Do not duplicate posts on home page (if posts are displayed inside featured area they will not be displayed inside post listing below)', THEME_SLUG),
                        'default'   => true,
                        'required' => array('home_featured_area', '=', true)
                    ),
                    
                    array(
                        'id'        => 'home_page_layout',
                        'type'      => 'image_select',
                        'title'     => __('Home page posts layout', THEME_SLUG),
                        'subtitle'  => __('Choose how to display your posts on home page', THEME_SLUG),
                        'options'   => thr_get_post_layouts(),
                        'default'   => 'layout-a'
                    )
                  )
   );
    
    /* Single Post */
    $this->sections[] = array(
                'icon'      => 'el-icon-pencil',
                'title'     => __('Single Post', THEME_SLUG),
                'desc'     => __('Manage settings for single post template', THEME_SLUG),
                'fields'    => array(
                    
                    array(
                        'id'        => 'single_layout',
                        'type'      => 'image_select',
                        'title'     => __('Single post layout', THEME_SLUG),
                        'subtitle'  => __('Choose default layout for single posts', THEME_SLUG),
                        'desc' => __('Note: You can override this option for each specific post', THEME_SLUG),
                        'options'   => array(
                            'a' => array('title' => __('Classic', THEME_SLUG),  'img' => ReduxFramework::$_url . 'assets/img/single_normal.png'),
                            'b' => array('title' => __('Featured', THEME_SLUG),  'img' => ReduxFramework::$_url . 'assets/img/single_featured.png')
                        ),
                        'default'   => 'a'
                    ),

                    array(
                        'id'        => 'single_use_sidebar',
                        'type'      => 'select',
                        'title'     => __('Use single post sidebar', THEME_SLUG),
                        'subtitle'  => __('Choose default single post sidebar type', THEME_SLUG),
                        'options'   => thr_get_sidebar_layouts(),
                        'default'   => 'right'
                    ),

                    array(
                        'id'        => 'single_sidebar',
                        'type'      => 'select',
                        'title'     => __('Post standard sidebar', THEME_SLUG),
                        'subtitle'  => __('Choose single post standard sidebar', THEME_SLUG),
                        'options'   => $sidebars_list,
                        'default'   => 'thr_default_sidebar',
                        'required'  => array('single_use_sidebar', '!=', '0')
                    ),

                    array(
                        'id'        => 'single_sticky_sidebar',
                        'type'      => 'select',
                        'title'     => __('Post sticky sidebar', THEME_SLUG),
                        'subtitle'  => __('Choose single post sticky sidebar', THEME_SLUG),
                        'options'   => $sidebars_list,
                        'default'   => 'thr_default_sticky_sidebar',
                        'required'  => array('single_use_sidebar', '!=', '0')
                    ),

                    array(
                        'id'        => 'single_meta',
                        'type'      => 'sortable',
                        'mode'      => 'checkbox',
                        'title'     => __('Meta data', THEME_SLUG),
                        'subtitle'  => __('Check which meta data to show for single post', THEME_SLUG),
                        'options'   => array(
                            'date' => __('Date/time', THEME_SLUG),
                            'author' => __('Author', THEME_SLUG),
                            'categories' => __('Categories', THEME_SLUG),
                            'comments' => __('Comments', THEME_SLUG)
                        ),
                        'default' => array(
                            'date' => 1,
                            'author' => 1,
                            'categories' => 1,
                            'comments' => 1
                        )
                    ),

                    array(
                        'id' => 'show_fimg',
                        'type' => 'switch',
                        'title' => __('Display featured image', THEME_SLUG),
                        'subtitle' => __('Choose if you want to display featured image', THEME_SLUG),
                        'default' => true
                     ),

                    array(
                        'id' => 'show_share',
                        'type' => 'switch',
                        'title' => __('Display share bar', THEME_SLUG),
                        'subtitle' => __('Choose if you want to display social share buttons', THEME_SLUG),
                        'default' => true
                     ),

                    array(
                        'id' => 'show_author_box',
                        'type' => 'switch',
                        'title' => __('Display author box', THEME_SLUG),
                        'subtitle' => __('Choose if you want to display "about author" area below post content.', THEME_SLUG),
                        'default' => true
                     ),
                   array(
                        'id' => 'show_prev_next',
                        'type' => 'switch',
                        'title' => __('Display previous/next post links', THEME_SLUG),
                        'subtitle' => __('Choose if you want to display previous and next post links for current post.', THEME_SLUG),
                        'default' => true
                   ),
                   array(
                        'id' => 'prev_next_cat',
                        'type' => 'checkbox',
                        'title' => __('Previous/next links to posts from same category?', THEME_SLUG),
                        'subtitle' => __('Check if you want previous and next post links to display only posts from same category.', THEME_SLUG),
                        'default' => false,
                        'required' => array('show_prev_next', '=', '1')
                   ),

                   array(
                        'id' => 'show_progressbar',
                        'type' => 'switch',
                        'title' => __('Display top progress bar', THEME_SLUG),
                        'subtitle' => __('Choose if you want to display top progress bar while scrolling throug post content.', THEME_SLUG),
                        'default' => true
                   )
                )
    );
    
    /* Page */
    $this->sections[] = array(
                'icon'      => 'el-icon-file-edit',
                'title'     => __('Page Templates', THEME_SLUG),
                'desc'     => __('Manage default settings for your pages (page templates)', THEME_SLUG),
                'fields'    => array(
                    
                    array(
                        'id'        => 'page_use_sidebar',
                        'type'      => 'select',
                        'title'     => __('Use page sidebar', THEME_SLUG),
                        'subtitle'  => __('Choose default page sidebar type', THEME_SLUG),
                        'options'   => thr_get_sidebar_layouts(),
                        'default'   => 'right'
                    ),

                    array(
                        'id'        => 'page_sidebar',
                        'type'      => 'select',
                        'title'     => __('Page standard sidebar', THEME_SLUG),
                        'subtitle'  => __('Choose page standard sidebar', THEME_SLUG),
                        'options'   => $sidebars_list,
                        'default'   => 'thr_default_sidebar',
                        'required'  => array('page_use_sidebar', '!=', '0')
                    ),

                    array(
                        'id'        => 'page_sticky_sidebar',
                        'type'      => 'select',
                        'title'     => __('Page sticky sidebar', THEME_SLUG),
                        'subtitle'  => __('Choose page sticky sidebar', THEME_SLUG),
                        'options'   => $sidebars_list,
                        'default'   => 'thr_default_sticky_sidebar',
                        'required'  => array('page_use_sidebar', '!=', '0')
                    )
                )
    );

    /* Categories */
    $this->sections[] = array(
                'icon'      => 'el-icon-folder',
                'title'     => __('Category Templates', THEME_SLUG),
                'desc'     => __('Manage settings for category templates. Note: these are global category settings, you can optionally modify these settings for each category.', THEME_SLUG),
                'fields'    => array(
                    
                    array(
                        'id'        => 'category_featured_area',
                        'type'      => 'switch',
                        'title'     => __('Display featured area', THEME_SLUG),
                        'subtitle'  => __('Check if you want to enable featured area for category templates', THEME_SLUG),
                        'default'   => false
                    ),
                    
                    array(
                        'id'        => 'category_fa_layout',
                        'type'      => 'image_select',
                        'title'     => __('Featured area layout', THEME_SLUG),
                        'subtitle'  => __('Choose a layout for your featured area on category templates', THEME_SLUG),
                        'options'   => thr_featured_area_layouts(),
                        'default'   => '3_0',
                        'required' => array('category_featured_area', 'equals', true)
                    ),
                    
                    array(
                        'id'        => 'category_layout',
                        'type'      => 'image_select',
                        'title'     => __('Category template layout', THEME_SLUG),
                        'subtitle'  => __('Choose how to display your posts on category templates', THEME_SLUG),
                        'options'   => thr_get_post_layouts(),
                        'default'   => 'layout-a'
                    ),

                    array(
                        'id'        => 'category_use_sidebar',
                        'type'      => 'select',
                        'title'     => __('Use category sidebar', THEME_SLUG),
                        'subtitle'  => __('Choose default category sidebar type', THEME_SLUG),
                        'options'   => thr_get_sidebar_layouts(),
                        'default'   => 'right'
                    ),

                    array(
                        'id'        => 'category_sidebar',
                        'type'      => 'select',
                        'title'     => __('Category standard sidebar', THEME_SLUG),
                        'subtitle'  => __('Choose standard category sidebar', THEME_SLUG),
                        'options'   => $sidebars_list,
                        'default'   => 'thr_default_sidebar',
                        'required'  => array('category_use_sidebar', '!=', '0')
                    ),

                    array(
                        'id'        => 'category_sticky_sidebar',
                        'type'      => 'select',
                        'title'     => __('Category sticky sidebar', THEME_SLUG),
                        'subtitle'  => __('Choose sticky category sidebar', THEME_SLUG),
                        'options'   => $sidebars_list,
                        'default'   => 'thr_default_sticky_sidebar',
                        'required'  => array('category_use_sidebar', '!=', '0')
                    )
                )
    );

    /* Tags */
    $this->sections[] = array(
                'icon'      => ' el-icon-tag',
                'title'     => __('Tag Templates', THEME_SLUG),
                'desc'     => __('Manage settings for tag templates', THEME_SLUG),
                'fields'    => array(
                     array(
                        'id'        => 'tag_featured_area',
                        'type'      => 'switch',
                        'title'     => __('Display featured area', THEME_SLUG),
                        'subtitle'  => __('Check if you want to enable featured area for tag templates', THEME_SLUG),
                        'default'   => false
                    ),
                    
                    array(
                        'id'        => 'tag_fa_layout',
                        'type'      => 'image_select',
                        'title'     => __('Featured area layout', THEME_SLUG),
                        'subtitle'  => __('Choose a layout for your featured area on tag templates', THEME_SLUG),
                        'options'   => thr_featured_area_layouts(),
                        'default'   => '3_0',
                        'required' => array('tag_featured_area', 'equals', true)
                    ),
                    
                    array(
                        'id'        => 'tag_layout',
                        'type'      => 'image_select',
                        'title'     => __('Tag template layout', THEME_SLUG),
                        'subtitle'  => __('Choose how to display your posts on tag templates', THEME_SLUG),
                        'options'   => thr_get_post_layouts(),
                        'default'   => 'layout-a'
                    ),

                    array(
                        'id'        => 'tag_use_sidebar',
                        'type'      => 'select',
                        'title'     => __('Use tags sidebar', THEME_SLUG),
                        'subtitle'  => __('Choose tags sidebar type', THEME_SLUG),
                        'options'   => thr_get_sidebar_layouts(),
                        'default'   => 'right'
                    ),

                    array(
                        'id'        => 'tag_sidebar',
                        'type'      => 'select',
                        'title'     => __('Tags standard sidebar', THEME_SLUG),
                        'subtitle'  => __('Choose standard sidebar for tags', THEME_SLUG),
                        'options'   => $sidebars_list,
                        'default'   => 'thr_default_sidebar',
                        'required'  => array('tag_use_sidebar', '!=', '0')
                    ),

                    array(
                        'id'        => 'tag_sticky_sidebar',
                        'type'      => 'select',
                        'title'     => __('Tags sticky sidebar', THEME_SLUG),
                        'subtitle'  => __('Choose sticky sidebar for tags', THEME_SLUG),
                        'options'   => $sidebars_list,
                        'default'   => 'thr_default_sticky_sidebar',
                        'required'  => array('tag_use_sidebar', '!=', '0')
                    )
                )
    );

    /* Author */
    $this->sections[] = array(
                'icon'      => 'el-icon-user',
                'title'     => __('Author Templates', THEME_SLUG),
                'desc'     => __('Manage settings for author templates', THEME_SLUG),
                'fields'    => array(
                     array(
                        'id'        => 'author_featured_area',
                        'type'      => 'switch',
                        'title'     => __('Display featured area', THEME_SLUG),
                        'subtitle'  => __('Check if you want to enable featured area for author templates', THEME_SLUG),
                        'default'   => false
                    ),
                    
                    array(
                        'id'        => 'author_fa_layout',
                        'type'      => 'image_select',
                        'title'     => __('Featured area layout', THEME_SLUG),
                        'subtitle'  => __('Choose a layout for your featured area on author templates', THEME_SLUG),
                        'options'   => thr_featured_area_layouts(),
                        'default'   => '3_0',
                        'required' => array('author_featured_area', 'equals', true)
                    ),
                    
                    array(
                        'id'        => 'author_layout',
                        'type'      => 'image_select',
                        'title'     => __('Author template layout', THEME_SLUG),
                        'subtitle'  => __('Choose how to display your posts on author templates', THEME_SLUG),
                        'options'   => thr_get_post_layouts(),
                        'default'   => 'layout-a'
                    ),

                    array(
                        'id'        => 'author_use_sidebar',
                        'type'      => 'select',
                        'title'     => __('Use author sidebar', THEME_SLUG),
                        'subtitle'  => __('Choose author sidebar type', THEME_SLUG),
                        'options'   => thr_get_sidebar_layouts(),
                        'default'   => 'right'
                    ),

                    array(
                        'id'        => 'author_sidebar',
                        'type'      => 'select',
                        'title'     => __('Author standard sidebar', THEME_SLUG),
                        'subtitle'  => __('Choose standard sidebar for author', THEME_SLUG),
                        'options'   => $sidebars_list,
                        'default'   => 'thr_default_sidebar',
                        'required'  => array('author_use_sidebar', '!=', '0')
                    ),

                    array(
                        'id'        => 'author_sticky_sidebar',
                        'type'      => 'select',
                        'title'     => __('Author sticky sidebar', THEME_SLUG),
                        'subtitle'  => __('Choose sticky sidebar for author', THEME_SLUG),
                        'options'   => $sidebars_list,
                        'default'   => 'thr_default_sticky_sidebar',
                        'required'  => array('author_use_sidebar', '!=', '0')
                    )
                )
    );

    /* Archives */
  
    $this->sections[] = array(
                'icon'      => 'el-icon-folder-open',
                'title'     => __('Archive Templates', THEME_SLUG),
                'desc'     => __('Manage settings for other miscellaneous templates like date archives, post format archives, etc...', THEME_SLUG),
                'fields'    => array(
                    
                    array(
                        'id'        => 'other_archives_layout',
                        'type'      => 'image_select',
                        'title'     => __('Archives layout', THEME_SLUG),
                        'subtitle'  => __('Choose how to display your posts on miscellaneous archive templates', THEME_SLUG),
                        'options'   => thr_get_post_layouts(),
                        'default'   => 'layout-a'
                    ),

                    array(
                        'id'        => 'other_archives_use_sidebar',
                        'type'      => 'select',
                        'title'     => __('Use archives sidebar', THEME_SLUG),
                        'subtitle'  => __('Choose archives sidebar type', THEME_SLUG),
                        'options'   => thr_get_sidebar_layouts(),
                        'default'   => 'right'
                    ),

                    array(
                        'id'        => 'other_archives_sidebar',
                        'type'      => 'select',
                        'title'     => __('Archives standard sidebar', THEME_SLUG),
                        'subtitle'  => __('Choose standard sidebar for archives', THEME_SLUG),
                        'options'   => $sidebars_list,
                        'default'   => 'thr_default_sidebar',
                        'required'  => array('other_archives_use_sidebar', '!=', '0')
                    ),

                    array(
                        'id'        => 'other_archives_sticky_sidebar',
                        'type'      => 'select',
                        'title'     => __('Archives sticky sidebar', THEME_SLUG),
                        'subtitle'  => __('Choose sticky sidebar for archives', THEME_SLUG),
                        'options'   => $sidebars_list,
                        'default'   => 'thr_default_sticky_sidebar',
                        'required'  => array('other_archives_use_sidebar', '!=', '0')
                    ),

                    array(
                        'id'        => 'section_search',
                        'type'      => 'section',
                        'title'     => __('Search template', THEME_SLUG),
                        'subtitle'  => __('Manage settings for search template', THEME_SLUG)
                    ),
                                        
                    array(
                        'id'        => 'search_layout',
                        'type'      => 'image_select',
                        'title'     => __('Search template layout', THEME_SLUG),
                        'subtitle'  => __('Choose how to display your posts on search templates', THEME_SLUG),
                        'options'   => thr_get_post_layouts(),
                        'default'   => 'layout-d'
                    ),

                    array(
                        'id'        => 'search_use_sidebar',
                        'type'      => 'select',
                        'title'     => __('Use search sidebar', THEME_SLUG),
                        'subtitle'  => __('Choose search sidebar type', THEME_SLUG),
                        'options'   => thr_get_sidebar_layouts(),
                        'default'   => 'right'
                    ),

                    array(
                        'id'        => 'search_sidebar',
                        'type'      => 'select',
                        'title'     => __('Search standard sidebar', THEME_SLUG),
                        'subtitle'  => __('Choose standard sidebar for search', THEME_SLUG),
                        'options'   => $sidebars_list,
                        'default'   => 'thr_default_sidebar',
                        'required'  => array('search_use_sidebar', '!=', '0')
                    ),

                    array(
                        'id'        => 'search_sticky_sidebar',
                        'type'      => 'select',
                        'title'     => __('Search sticky sidebar', THEME_SLUG),
                        'subtitle'  => __('Choose sticky sidebar for search', THEME_SLUG),
                        'options'   => $sidebars_list,
                        'default'   => 'thr_default_sticky_sidebar',
                        'required'  => array('search_use_sidebar', '!=', '0')
                    ),

                    array(
                        'id'        => 'section_posts',
                        'type'      => 'section',
                        'title'     => __('Posts page', THEME_SLUG),
                        'subtitle'  => __('Manage settings for posts page. Note: this settings will apply to a page you are using as "Posts Page" option in your <a href="'.admin_url('options-reading.php').'">Settings -> Reading</a> page.', THEME_SLUG)
                    ),

                    array(
                        'id'        => 'posts_page_layout',
                        'type'      => 'image_select',
                        'title'     => __('Posts page layout', THEME_SLUG),
                        'subtitle'  => __('Choose how to display your posts on your "posts page"', THEME_SLUG),
                        'options'   => thr_get_post_layouts(),
                        'default'   => 'layout-a'
                    )
                  )
   );
    
    /* Typography */
    $this->sections[] = array(
                'icon'      => 'el-icon-font',
                'title'     => __('Typography', THEME_SLUG),
                'desc'     => __('Manage fonts and typography settings', THEME_SLUG),
                'fields'    => array(
    
                    array(
                        'id'          => 'main_font',
                        'type'        => 'typography', 
                        'title'       => __('Main text font', THEME_SLUG),
                        'google'      => true, 
                        'font-backup' => false,
                        'font-size' => false,
                        'color' => false,
                        'line-height' => false,
                        'text-align' => false,
                        'units'       =>'px',
                        'subtitle'    => __('Typography option with each property can be called individually.', THEME_SLUG),
                        'default'     => array(
                            'google'      => true,
                            'font-weight'  => '300', 
                            'font-family' => 'Roboto',
                            'subsets' => 'latin'
                        ),
                        'preview' => array(
                            'always_display' => true,
                            'font-size' => '16px',
                            'text' => 'This is a font used for your main content on the website. Here in MeksHQ, we think that readibility is very important part of any WordPress theme. This is actually a rough example of how simple paragpraph of text will look like on your website so you have a simple preview here.'
                        )
                    ),

                    array(
                        'id'          => 'h_font',
                        'type'        => 'typography', 
                        'title'       => __('Headings font', THEME_SLUG),
                        'google'      => true, 
                        'font-backup' => false,
                        'font-size' => false,
                        'color' => false,
                        'line-height' => false,
                        'text-align' => false,
                        'units'       =>'px',
                        'subtitle'    => __('Typography option with each property can be called individually.', THEME_SLUG),
                        'default'     => array(
                            'google'      => true,
                            'font-weight'  => '400',
                            'font-family' => 'PT Sans Narrow',
                            'subsets' => 'latin'
                        ),
                        'preview' => array(
                            'always_display' => true,
                            'font-size' => '40px',
                            'text' => 'There is no good blog without great readability'
                        )

                    ),

                    array(
                        'id'          => 'nav_font',
                        'type'        => 'typography', 
                        'title'       => __('Navigation font', THEME_SLUG),
                        'google'      => true, 
                        'font-backup' => false,
                        'font-size' => false,
                        'color' => false,
                        'line-height' => false,
                        'text-align' => false,
                        'units'       =>'px',
                        'subtitle'    => __('Typography option with each property can be called individually.', THEME_SLUG),
                        'default'     => array(
                            'google'      => true,
                            'font-weight'  => '400', 
                            'font-family' => 'Roboto Condensed',
                            'subsets' => 'latin'
                        ),

                        'preview' => array(
                            'always_display' => true,
                            'font-size' => '16px',
                            'text' => 'Home &nbsp;&nbsp;About &nbsp;&nbsp;Blog &nbsp;&nbsp;Contact'
                        )

                    ),
                array(
                        'id' => 'text_upper',
                        'type' => 'checkbox',
                        'multi' => true,
                        'title' => __('Uppercase text', THEME_SLUG),
                        'subtitle' => __('Check if you want to show CAPITAL LETTERS for specific elements', THEME_SLUG),
                        'options' => array(
                            'site-title a' => __('Site title', THEME_SLUG),
                            'site-desc' => __('Site description', THEME_SLUG),
                            'nav-menu li a' => __('Main navigation', THEME_SLUG),
                            'entry-title' => __('Post/Page titles', THEME_SLUG),
                            'archive-title h1' => __('Archive (category, tag, etc...) titles', THEME_SLUG),
                            'widget-title' => __('Widget titles', THEME_SLUG),
                            'footer_wrapper .widget-title' => __('Footer widget titles', THEME_SLUG),
                            'featured_title_over h2' => __('Featured area titles', THEME_SLUG)
                            ),
                        'default' => array(
                            'site-title a' => 1,
                            'site-desc' => 0,
                            'nav-menu li a' => 1,
                            'entry-title' => 0,
                            'archive-title h1' => 0,
                            'widget-title' => 0,
                            'footer_wrapper .widget-title' => 1,
                            'featured_title_over h2' => 0
                          )
                    )

                )
    );
  
    

    $this->sections[] = array(
                'type' => 'divide',
    );

    /* Translation Options */

    $translate_options[] = array(
                            'id' => 'enable_translate',
                            'type' => 'switch',
                            'switch' => true,
                            'title' => __('Enable theme translation?', THEME_SLUG),
                            'default' => '1'
                    );
    
    $translate_strings = thr_get_translate_options();
    
    foreach($translate_strings as $string_key => $string){
        $translate_options[] = array(
                'id' => 'tr_'.$string_key,
                'type' => 'text',
                'title' => $string['option_title'],
                'validate' => 'no_html',
                'default' => ''
        );
    }
    
    $this->sections[] = array(
                    'icon'      => 'el-icon-globe-alt',
                    'title' => __('Translation', THEME_SLUG),
                    'desc' => __('Use these settings to quckly translate or modify strings inside this theme. If you want to remove the word completely instead of modifying it, use "-1" as a value for particular string. <strong>Note:</strong> If you are using this theme for multilingual website, you need to disable these options and use multilanguage plugins (such as WPML) or manual translation via .po and .mo files located inside "wp-content/themes/throne/languages" folder.', THEME_SLUG),
                    'fields' => $translate_options
    );
    
    
    /* Updater Options */

    $this->sections[] = array(
                    'icon'      => 'el-icon-time',
                    'title' => __('Updater', THEME_SLUG),
                    'desc' => sprintf( __('Specify your ThemeForest username and API Key in order to enable quick Throne theme updates. Whenever we release new Throne update it will appear on your <a href="%s">updates screen</a>.', THEME_SLUG),admin_url('update-core.php')),
                    'fields' => array(

                        array(
                            'id' => 'theme_update_username',
                            'type' => 'text',
                            'title' => __('Your ThemeForest Username', THEME_SLUG),
                            'default' => ''
                         ),

                        array(
                            'id' => 'theme_update_apikey',
                            'type' => 'text',
                            'title' => __('Your ThemeForest API Key', THEME_SLUG),
                            'desc' => __('Where can I find my <a href="http://themeforest.net/help/api" target="_blank">API key</a>?', THEME_SLUG),
                            'default' => ''
                        )
                )
    );
?>