<?php

require('custom_api_wp_ui.php');
require('license_purchase.php');
function custom_api_wp_main_menu(){

    $currenttab = "";
	if( isset( $_GET['action'] ) )
        $currenttab = $_GET['action'];

        
        if (isset($_GET['api'])) 
            $api = custom_api_wp_sanitise1($_GET['api']);
        
        Custom_API_Admin_Menu::custom_api_auth_show_menu( $currenttab );
	echo '
	<div id="mo_api_authentication_settings">';
		echo '
		<div class="miniorange_container">';
		echo '
		<table style="width:100%;">
			<tr>
				<td style="vertical-align:top;width:65%;" class="mo_api_authentication_content">';
					Custom_API_Admin_Menu::custom_api_auth_show_tab( $currenttab );
				echo '</tr>
		</table>
		<div class="mo_api_authentication_tutorial_overlay" id="mo_api_authentication_tutorial_overlay" hidden></div>
		</div>';
}

class Custom_API_Admin_Menu {
	
	public static function custom_api_auth_show_menu( $currenttab ) { ?> 
		<div class="wrap">
			<div>
				<img style="float:left;" src="<?php echo plugin_dir_url( __FILE__ );?>/images/miniorange.png">
			</div>
		</div>
		<div class="wrap">
	       	<h3>
	            miniOrange Custom API &nbsp
	           	<a class="add-new-h2" href="https://forum.miniorange.com/" target="_blank">Ask questions on our forum</a>
				<a class="add-new-h2" href="https://faq.miniorange.com/" target="_blank">FAQ</a>	
	       	</h3>
       	</div>
        <style>
            .add-new-hover:hover{
                color: white !important;
            }
        </style>
		<div id="tab">
			<h2 class="nav-tab-wrapper" style="line-height:40px;">
                <a class="nav-tab <?php if( $currenttab == 'list' || $currenttab == '' ) echo 'mo_api_auth_nav_tab_active';?>" href="admin.php?page=custom_api_wp_settings">Available APIs</a>&nbsp;
                <a class="nav-tab <?php if( $currenttab == 'addapi' ) echo 'mo_api_auth_nav_tab_active';?>" href="admin.php?page=custom_api_wp_settings&action=addapi">Create API</a>
                <a class="nav-tab <?php if( $currenttab == 'add_auth' ) echo 'mo_api_auth_nav_tab_active';?>" href="admin.php?page=custom_api_wp_settings&action=add_auth">Add Authentication</a>
                <a class="nav-tab <?php if( $currenttab == 'register' ) echo 'mo_api_auth_nav_tab_active';?>" href="admin.php?page=custom_api_wp_settings&action=register">Account Setup</a>
                <a class="nav-tab <?php if( $currenttab == 'license' ) echo 'mo_api_auth_nav_tab_active';?>" href="admin.php?page=custom_api_wp_settings&action=license">License</a>
            </h2>
		</div>
		<?php
	
	}
	
	
	public static function custom_api_auth_show_tab( $currenttab ) { 
		if($currenttab == 'register') {
			if (get_option ( 'custom_api_authentication_verify_customer' )) {
				custom_api_already_customer();
			} else if (trim ( get_option ( 'custom_api_authentication_email' ) ) != '' && trim ( get_option ( 'mo_api_authentication_admin_api_key' ) ) == '' ) {
				custom_api_already_customer();
			}
			else {
				register();
			}
        } 
        elseif( $currenttab == '' || $currenttab == 'list')
        custom_api_wp_list_api();
		elseif( $currenttab == 'addapi')
		custom_api_wp_add_api();
        elseif( $currenttab == 'add_auth')
        custom_api_wp_authentication();
       
        elseif( $currenttab == 'license'){
		custom_api_authentication_licensing_page();
		}
        elseif($currenttab == 'edit'){
            if (isset($_GET['api'])) {
                $api = custom_api_wp_sanitise1($_GET['api']);
                custom_api_wp_edit_api($api);
            }
        }
        elseif($currenttab == 'delete'){
            if (isset($_GET['api'])) {
                // $api = custom_api_wp_sanitise1($_GET['api']);
                $api = custom_api_wp_sanitise1($_GET['api']);
                custom_api_wp_delete_api($api);
            }
        }
	} 

	public static function custom_api_auth_registration_view() {
	    
	    if(get_option('custom_api_authentication_new_customer')){
            register();  
        }
        elseif(get_option('custom_api_authentication_verify_customer')){
            custom_api_already_customer();
        }
       
	}
	
	
		
}