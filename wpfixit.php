<?php   
/* 
Plugin Name: WP Fix It - Instant WP Support
Version: 1.4
Plugin URI: http://wpfixit.com
Description: WP Support just got easier and faster. Plugin for submiting a support ticket to WP Fix It for Instant Support.
Author: WP Fix It
Author URI: http://wpfixit.com
License: GPLv2 or later
*/

// Hook for adding admin menus
add_action( 'admin_bar_menu', 'toolbar_wpfixit', 999 );

function toolbar_wpfixit( $wp_admin_bar ) {	
	$args = array(		
	'id'    => 'wpfixit_page',		
	'title' => __('<img src="' . plugins_url( 'wp-fix-it-instant-wp-support/images/favicon.ico' ) . '" style="vertical-align:middle;margin-right:5px" alt="WP Fix It" title="WP Fix It" />Support Ticket' ),		
	'href'  => '/wp-admin/admin.php?page=wpfixit',		
	'meta'  => array( 'class' => 'my-toolbar-page' )	);	
	$wp_admin_bar->add_node( $args );
	}

add_action('admin_menu', 'wpfixit_add_pages');

// action function for above hook
function wpfixit_add_pages() {

// Top Level Support Ticket Menu
    add_menu_page(__('Support Ticket','menu-test'), __('Support Ticket','menu-test'), 'manage_options', 'wpfixit',  'wpfixit_toplevel_page', plugins_url( 'wp-fix-it-instant-wp-support/images/favicon.ico' ), 0 );

// Display Content For Submitting a Ticket
function wpfixit_toplevel_page() {
 	wp_enqueue_script( 'wp_fix_it_freshwidget_config', plugins_url( basename( __DIR__ ) . '/js/wpfixit.js'),
		array( 'wp_fix_it_freshwidget' ));

 	wp_deregister_script( 'wp_fix_it_freshwidget' );
    wp_register_script( 'wp_fix_it_freshwidget', ( '//assets.freshdesk.com/widget/freshwidget.js' ), false, null, true );
    wp_enqueue_script( 'wp_fix_it_freshwidget' );

  	wp_enqueue_style( 'wp_fix_it_css', plugins_url( basename( __DIR__ ) . '/css/wpfixit.css'));
	
    echo '	
    	<div style="max-width: 600px; width 100%; padding-right 15px;">
    		<a href="http://wpfixit.com" TARGET="_blank">
    			<img class="wpfixit-logo" src="' . plugins_url( 'wp-fix-it-instant-wp-support/images/logo.png' ) . '"  alt="WP Fix It" title="WP Fix It">
    	</a><br/>  <span style="font-size: x-large;"><strong>GET INSTANT WORDPRESS SUPPORT 24/7</strong></span><br/><br/>
    	<span style="font-size: medium;">
    		<strong>
    			<span style="text-decoration: underline; color: #e99d3a;">
    				<span style="text-decoration: underline;">Before you submit your ticket
    				</span>
				</span> ...
			</strong> 
			<span style="font-size: x-large;">
				<strong>Here are Some Pointers</strong>
			</span>
		</span>
		<ul>
			<ul>
				<ul>	
					<li>
						<span style="font-size: medium;">
							<strong>
								<span style="text-decoration: underline; color: #e16456;">
									<span style="text-decoration: underline;">
										<img width="126" height="188" alt="Fix It Fast" src="' . plugins_url( 'wp-fix-it-instant-wp-support/images/WP-Fixer.png' ) . '" title="Fix It Fast" style="float: right;" class="wp-image-3792 alignright">
									</span>
								</span>
							</strong>
						</span>
						<span style="font-size: 14px;">
							<strong>Create a new admin user &amp; remove it once we are done.
							</strong>
						</span>
					</li>	
					<li>
						<span style="font-size: 14px;">
							<strong>Take screen shots of your problem so you can include them.
							</strong>
						</span>
					</li>	
					<li>
						<span style="font-size: 14px;">
							<strong>If you know your FTP login info, include it in ticket details.
							</strong>
						</span>
					</li>
				</ul>
			</ul>
		</ul>We understand that you may be a little nervous to hand over your login details and we want to assure you that asking for them is for the sole purpose of getting your WP issue resolved quickly and effectively. We would never use your information in any unlawful or unethical manor. Please be descriptive and provide demonstrative links where possible. You will be notified when our support staff updates your ticket. Once your details are received, an agent will be assigned to your ticket and get working on resolving your sisue as fast as possible.
		<hr>
		<span id="wpfixit_iframe"></span>
		
	</div>';
}
}