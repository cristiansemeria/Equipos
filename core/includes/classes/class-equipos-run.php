<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Class Equipos_Run
 *
 * Thats where we bring the plugin to life
 *
 * @package		EQUIPOS
 * @subpackage	Classes/Equipos_Run
 * @author		Cristian Semeria
 * @since		1.1.0
 */
class Equipos_Run{

	/**
	 * Our Equipos_Run constructor 
	 * to run the plugin logic.
	 *
	 * @since 1.1.0
	 */
	function __construct(){
		$this->add_hooks();
	}

	/**
	 * ######################
	 * ###
	 * #### WORDPRESS HOOKS
	 * ###
	 * ######################
	 */

	/**
	 * Registers all WordPress and plugin related hooks
	 *
	 * @access	private
	 * @since	1.1.0
	 * @return	void
	 */
	private function add_hooks(){
	
		add_action( 'plugin_action_links_' . EQUIPOS_PLUGIN_BASE, array( $this, 'add_plugin_action_link' ), 20 );
	
	}

	/**
	 * ######################
	 * ###
	 * #### WORDPRESS HOOK CALLBACKS
	 * ###
	 * ######################
	 */

	/**
	* Adds action links to the plugin list table
	*
	* @access	public
	* @since	1.1.0
	*
	* @param	array	$links An array of plugin action links.
	*
	* @return	array	An array of plugin action links.
	*/
	public function add_plugin_action_link( $links ) {

		$links['our_shop'] = sprintf( '<a href="%s" target="_blank title="Equipos" style="font-weight:700;">%s</a>', 'https://grupohega.mx', __( 'Equipos', 'equipos' ) );

		return $links;
	}

}
