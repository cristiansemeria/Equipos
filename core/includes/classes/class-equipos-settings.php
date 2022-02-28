<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Class Equipos_Settings
 *
 * This class contains all of the plugin settings.
 * Here you can configure the whole plugin data.
 *
 * @package		EQUIPOS
 * @subpackage	Classes/Equipos_Settings
 * @author		Cristian Semeria
 * @since		1.1.0
 */
class Equipos_Settings{

	/**
	 * The plugin name
	 *
	 * @var		string
	 * @since   1.1.0
	 */
	private $plugin_name;

	/**
	 * Our Equipos_Settings constructor 
	 * to run the plugin logic.
	 *
	 * @since 1.1.0
	 */
	function __construct(){

		$this->plugin_name = EQUIPOS_NAME;
	}

	/**
	 * ######################
	 * ###
	 * #### CALLABLE FUNCTIONS
	 * ###
	 * ######################
	 */

	/**
	 * Return the plugin name
	 *
	 * @access	public
	 * @since	1.1.0
	 * @return	string The plugin name
	 */
	public function get_plugin_name(){
		return apply_filters( 'EQUIPOS/settings/get_plugin_name', $this->plugin_name );
	}
}
