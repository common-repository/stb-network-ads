<?php

    /**
     * For full documentation, please visit: http://docs.reduxframework.com/
     * For a more extensive sample-config file, you may look at:
     * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "stb_network_ads";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        'opt_name' => 'stb_network_ads',
        'dev_mode' => false,
        'display_name' => 'STB.Network',
        'color' => '#cccccc',
        'display_version' => '1.0.0',
        'page_slug' => 'stb-network-ads',
        'page_title' => 'STB.Network Ad Inserter',
        'update_notice' => FALSE,
        'menu_type' => 'menu',
        'menu_title' => 'STB.Network',
        'menu_icon' => 'dashicons-analytics',
        'allow_sub_menu' => TRUE,
        'page_parent_post_type' => 'stb-network-ads',
        'page_priority' => '99',
        'default_mark' => '*',
        'hints' => array(
            'icon_position' => 'right',
            'icon_size' => 'normal',
            'tip_style' => array(
                'color' => 'light',
                'shadow' => '1',
            ),
            'tip_position' => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect' => array(
                'show' => array(
                    'duration' => '500',
                    'event' => 'mouseover',
                ),
                'hide' => array(
                    'duration' => '500',
                    'event' => 'mouseleave unfocus',
                ),
            ),
        ),
        'settings_api' => TRUE,
        'cdn_check_time' => '1440',
        'compiler' => TRUE,
        'page_permissions' => 'manage_options',
        'save_defaults' => TRUE,
        'show_import_export' => FALSE,
        'database' => 'options',
        'transient_time' => '3600',
        'network_sites' => TRUE,
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/stb.network',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'https://twitter.com/STBnetwork',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.linkedin.com/company/stb-network/',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'admin_folder' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'admin_folder' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'admin_folder' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'admin_folder' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'admin_folder' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    Redux::setSection( $opt_name, array(
        'title'  => __( 'Basic Settings', 'stb-network-ads' ),
        'id'     => 'basic',
        'icon'   => 'el el-home',
        'fields' => array(
            array(
                'id'       => 'ad-rcd',
                'type'     => 'text',
                'title'    => __( 'Ad zone RCD', 'stb-network-ads' ),
                'desc'     => __( 'Read more in the <b><a href="https://docs.stb.network/" target="_blank">Documentation</a></b>', 'stb-network-ads' ),
                'subtitle' => __( 'Type in your ad zone <b>Rcd</b> to be credited for the clicks', 'stb-network-ads' ),
                'default' => 'OA==',
            )
        )
    ) );


    Redux::setSection( $opt_name, array(
        'title'  => __( 'Contextual Ads', 'stb-network-ads' ),
        'subtitle' => __( 'Select the placement of contextual ads', 'stb-network-ads' ),
        'id'     => 'contextual-ads',
        'icon'   => 'el  el-indent-left',
        'fields' => array(
            array(
                'id'       => 'contextual-enable',
                'type'     => 'switch',
                'title'    => __( 'Enable Contextual Ads', 'stb-network-ads' ),
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
        )
    ) );
    
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Before Content Ads', 'stb-network-ads' ),
        'id'         => 'contextual-top',
        'subsection' => true,
        'required' => array(
            array( 'contextual-enable', '=', '1' ),
        ),
        'fields'     => array(
            array(
                'id'       => 'contextual-top-enable',
                'type'     => 'switch',
                'required' => array( 'contextual-enable', '=', '1' ),
                'title'    => __( 'BEFORE Content Ads', 'stb-network-ads' ),
                'subtitle' => __( '<span style="color: #0000ff;">Enable Ads <b>Before</b> Content</span>', 'stb-network-ads' ),
                'default'  => '0',
            ),
            array(
                'id'       => 'contextual-top-rcd-enable',
                'type'     => 'switch',
                'required' => array(
                    array( 'contextual-enable', '=', '1' ),
                    array( 'contextual-top-enable', '=', '1' )
                ),
                'title'    => __( 'Different Rcd for Before Content Ads', 'stb-network-ads' ),
                'subtitle' => __( 'Specify <b>different Rcd</b>', 'stb-network-ads' ),
                'default'  => '0',
            ),
            array(
                'id'       => 'contextual-top-rcd',
                'type'     => 'text',
                'required' => array(
                    array( 'contextual-enable', '=', '1' ),
                    array( 'contextual-top-enable', '=', '1' ),
                    array( 'contextual-top-rcd-enable', '=', '1' )
                ),
                'title'    => __( 'Specify RCD', 'stb-network-ads' ),
                'desc'     => __( 'Read more in the <b><a href="https://docs.stb.network/" target="_blank">Documentation</a></b>', 'stb-network-ads' ),
                'subtitle' => __( 'Type in your ad zone <b>Rcd</b> to be credited for the clicks', 'stb-network-ads' ),
                'default' => 'OA==',
            ),
            array(
                'id'       => 'contextual-top-size',
                'type'     => 'select',
                'required' => array(
                    array( 'contextual-enable', '=', '1' ),
                    array( 'contextual-top-enable', '=', '1' )
                ),
                'title'    => __( 'Select Individual Ad Width', 'stb-network-ads' ),
                'subtitle' => __( 'Select from 125px or 200px ad width', 'stb-network-ads' ),
                //Must provide key => value pairs for select options
                'options'  => array(
                    '1' => '125px',
                    '2' => '200px',
                ),
                'default'  => '2'
            ),
            array(
                'id'            => 'contextual-top-count',
                'type'          => 'slider',
                'required' => array(
                    array( 'contextual-enable', '=', '1' ),
                    array( 'contextual-top-enable', '=', '1' )
                ),
                'title'         => __( 'Select the number of ads to be displayed per row', 'stb-network-ads' ),
                'default'       => 3,
                'min'           => 1,
                'step'          => 1,
                'max'           => 8,
                'resolution'    => 1,
                'display_value' => 'text'
            ),
            array(
                'id'       => 'contextual-top-color',
                'type'     => 'color',
                'required' => array(
                    array( 'contextual-enable', '=', '1' ),
                    array( 'contextual-top-enable', '=', '1' )
                ),
                'title'    => __( 'Select Ad Background Color', 'stb-network-ads' ),
                'default'  => '#ffffff',
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Inside Content Ads', 'stb-network-ads' ),
        'id'         => 'contextual-inside',
        'subsection' => true,
        'required' => array(
            array( 'contextual-enable', '=', '1' ),
        ),
        'fields'     => array(
            array(
                'id'       => 'contextual-inside-enable',
                'type'     => 'switch',
                'required' => array( 'contextual-enable', '=', '1' ),
                'title'    => __( 'INSIDE Content Ad', 'stb-network-ads' ),
                'subtitle' => __( '<span style="color: #0000ff;">Enable Ads <b>Inside</b> Content</span>', 'stb-network-ads' ),
                'default'  => '0',
            ),
            array(
                'id'       => 'contextual-inside-rcd-enable',
                'type'     => 'switch',
                'required' => array(
                    array( 'contextual-enable', '=', '1' ),
                    array( 'contextual-inside-enable', '=', '1' )
                ),
                'title'    => __( 'Different Rcd for Inside Content Ads', 'stb-network-ads' ),
                'subtitle' => __( 'Specify <b>different Rcd</b>', 'stb-network-ads' ),
                'default'  => '0',
            ),
            array(
                'id'       => 'contextual-inside-rcd',
                'type'     => 'text',
                'required' => array(
                    array( 'contextual-enable', '=', '1' ),
                    array( 'contextual-inside-enable', '=', '1' ),
                    array( 'contextual-inside-rcd-enable', '=', '1' )
                ),
                'title'    => __( 'Specify RCD', 'stb-network-ads' ),
                'desc'     => __( 'Read more in the <b><a href="https://docs.stb.network/" target="_blank">Documentation</a></b>', 'stb-network-ads' ),
                'subtitle' => __( 'Type in your ad zone <b>Rcd</b> to be credited for the clicks', 'stb-network-ads' ),
                'default' => 'OA==',
            ),
            array(
                'id'       => 'contextual-inside-size',
                'type'     => 'select',
                'required' => array(
                    array( 'contextual-enable', '=', '1' ),
                    array( 'contextual-inside-enable', '=', '1' )
                ),
                'title'    => __( 'Select Individual Ad Width', 'stb-network-ads' ),
                'subtitle' => __( 'Select from 125px or 200px ad width', 'stb-network-ads' ),
                //Must provide key => value pairs for select options
                'options'  => array(
                    '1' => '125px',
                    '2' => '200px',
                ),
                'default'  => '2'
            ),
            array(
                'id'            => 'contextual-inside-count',
                'type'          => 'slider',
                'required' => array(
                    array( 'contextual-enable', '=', '1' ),
                    array( 'contextual-inside-enable', '=', '1' )
                ),
                'title'         => __( 'Select the number of ads to be displayed per row', 'stb-network-ads' ),
                'default'       => 3,
                'min'           => 1,
                'step'          => 1,
                'max'           => 8,
                'resolution'    => 1,
                'display_value' => 'text'
            ),

            array(
                'id'       => 'contextual-inside-paragraphs',
                'type'     => 'text',
                'required' => array(
                    array( 'contextual-enable', '=', '1' ),
                    array( 'contextual-inside-enable', '=', '1' )
                ),
                'title'    => __( 'Paragraphs before ads', 'stb-network-ads' ),
				'validate' => 'numeric',
                'desc'     => __( 'Chose number of paragraphs before ads', 'stb-network-ads' ),
                'default'  => '3',
            ),
            array(
                'id'       => 'contextual-inside-color',
                'type'     => 'color',
                'required' => array(
                    array( 'contextual-enable', '=', '1' ),
                    array( 'contextual-inside-enable', '=', '1' )
                ),
                'title'    => __( 'Select Ad Background Color', 'stb-network-ads' ),
                'default'  => '#ffffff',
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => __( 'After Content Ads', 'stb-network-ads' ),
        'id'         => 'contextual-bottom',
        'subsection' => true,
        'required' => array(
            array( 'contextual-enable', '=', '1' ),
        ),
        'fields'     => array(
            array(
                'id'       => 'contextual-bottom-enable',
                'type'     => 'switch',
                'required' => array( 'contextual-enable', '=', '1' ),
                'title'    => __( 'AFTER Content ads', 'stb-network-ads' ),
                'subtitle' => __( '<span style="color: #0000ff;">Enable Ads <b>After</b> Content</span>', 'stb-network-ads' ),
                'default'  => '0',
            ),
            array(
                'id'       => 'contextual-bottom-rcd-enable',
                'type'     => 'switch',
                'required' => array(
                    array( 'contextual-enable', '=', '1' ),
                    array( 'contextual-bottom-enable', '=', '1' )
                ),
                'title'    => __( 'Different Rcd for After Content Ads', 'stb-network-ads' ),
                'subtitle' => __( 'Specify <b>different Rcd</b>', 'stb-network-ads' ),
                'default'  => '0',
            ),
            array(
                'id'       => 'contextual-bottom-rcd',
                'type'     => 'text',
                'required' => array(
                    array( 'contextual-enable', '=', '1' ),
                    array( 'contextual-bottom-enable', '=', '1' ),
                    array( 'contextual-bottom-rcd-enable', '=', '1' )
                ),
                'title'    => __( 'Specify RCD', 'stb-network-ads' ),
                'desc'     => __( 'Read more in the <b><a href="https://docs.stb.network/" target="_blank">Documentation</a></b>', 'stb-network-ads' ),
                'subtitle' => __( 'Type in your ad zone <b>Rcd</b> to be credited for the clicks', 'stb-network-ads' ),
                'default' => 'OA==',
            ),
            array(
                'id'       => 'contextual-bottom-size',
                'type'     => 'select',
                'required' => array(
                    array( 'contextual-enable', '=', '1' ),
                    array( 'contextual-bottom-enable', '=', '1' )
                ),
                'title'    => __( 'Select Individual Ad Width', 'stb-network-ads' ),
                'subtitle' => __( 'Select from 125px or 200px ad width', 'stb-network-ads' ),
                //Must provide key => value pairs for select options
                'options'  => array(
                    '1' => '125px',
                    '2' => '200px',
                ),
                'default'  => '2'
            ),
            array(
                'id'            => 'contextual-bottom-count',
                'type'          => 'slider',
                'required' => array(
                    array( 'contextual-enable', '=', '1' ),
                    array( 'contextual-bottom-enable', '=', '1' )
                ),
                'title'         => __( 'Select the number of ads to be displayed per row', 'stb-network-ads' ),
                'default'       => 3,
                'min'           => 1,
                'step'          => 1,
                'max'           => 8,
                'resolution'    => 1,
                'display_value' => 'text'
            ),
            array(
                'id'       => 'contextual-bottom-color',
                'type'     => 'color',
                'required' => array(
                    array( 'contextual-enable', '=', '1' ),
                    array( 'contextual-bottom-enable', '=', '1' )
                ),
                'title'    => __( 'Select Ad Background Color', 'stb-network-ads' ),
                'default'  => '#ffffff',
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Shortcodes', 'stb-network-ads' ),
        'id'     => 'shortcode',
        'icon'   => 'el  el-quote-right-alt',
        'fields' => array(
            array(
                'id'       => 'shortcode',
                'type'     => 'raw',
                'title'    => __( 'Shortcode Generator ', 'stb-network-ads' ),
                'desc'     => __( 'Use this simple shortcode generator to place ads using shortcode.', 'stb-network-ads' ),
                'subtitle' => __( 'Useful if you have themes that allow extensive customisation of ad zones.<br>You can place <b>multiple shortcodes on a page</b>.', 'stb-network-ads' ),
                'content'  => file_get_contents(dirname(__FILE__) . '/shortcode.php')
            )
        )
    ) );
        Redux::setSection( $opt_name, array(
        'title'  => __( 'Documentation', 'stb-network-ads' ),
        'id'     => 'docs',
        'icon'   => 'el  el-book',
        'fields' => array(
            array(
                'id'    => 'documentation-info',
                'type'  => 'info',
                'style' => 'info',
                'title' => __( 'Check the <a href="https://docs.stb.network" target="_blank"><b>Documentation</b></a> for more information', 'stb-network-ads' ),
            ),
        )
    ) );
    /*
     * <--- END SECTIONS
     */
