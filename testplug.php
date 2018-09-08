<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           Plugin_Name
 *
 * @wordpress-plugin
 * Plugin Name:       Aamna test plugin
 * Plugin URI:        http://localhost/testwp/
 * Description:       This plugin creates a form in the backened panel.
 * Version:           1.0.0
 * Author:            Aamna Hasan
 * Author URI:        http://ahblog.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       plugin-name
 * Domain Path:       /languages
 */

defined('ABSPATH')or die ('Hey,what are you doing here ?You silly human!');
if(!class_exists('AamnaPlugin'))
	
{
class AamnaPlugin
{
	
	
	function register()
	{
	add_action('admin_enqueue_scripts',array($this, 'enqueue'));	
	add_action('admin_menu',array($this,'add_admin_pages'));
	add_action( 'plugin_loaded', array($this,'prefix_update_table') );
	}
	
	   
	public function add_admin_pages()
	{
		add_menu_page('Aamna Plugin','Aamna','manage_options','aamna_plugin',array($this,'admin_index'),'dashicons-store',110);
		
		}
		
		public function admin_index()
		{
			require_once plugin_dir_path(__FILE__).'templates/admin.php';
			
			
		}
		
    
function enqueue()
{
	wp_enqueue_style('mypluginstyle',plugins_url('/assets/style.css',__FILE__));
		//wp_enqueue_style('mypluginstyle',plugins_url('/assets/javascript.js',__FILE__));
		}
function activate()
{
	global $wpdb;

	require_once plugin_dir_path(__FILE__).'inc/aamna-plugin-activate.php';
	

	
	
	$sqlQuery='
	CREATE TABLE `wp_myplugin` ( 
	`Name` varchar(50) NOT NULL, 
	`Email` varchar(50) NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=latin1';
	require_once ABSPATH.'/wp-admin/includes/upgrade.php'; 
	dbDelta($sqlQuery);
	
}


}
}




$aamnaPlugin=new AamnaPlugin();
$aamnaPlugin->register();
	
//activation
register_activation_hook(__File__,array($aamnaPlugin,'activate'));

//deactivation
require_once plugin_dir_path(__FILE__).'inc/aamna-plugin-deactivate.php';
register_deactivation_hook(__File__,array('AamnaPluginDeactivate','deactivate'));









