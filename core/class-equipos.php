<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! class_exists( 'Equipos' ) ) :

	/**
	 * Main Equipos Class.
	 *
	 * @package		EQUIPOS
	 * @subpackage	Classes/Equipos
	 * @since		1.1.0
	 * @author		Cristian Semeria
	 */
	final class Equipos {

		/**
		 * The real instance
		 *
		 * @access	private
		 * @since	1.1.0
		 * @var		object|Equipos
		 */
		private static $instance;

		/**
		 * EQUIPOS helpers object.
		 *
		 * @access	public
		 * @since	1.1.0
		 * @var		object|Equipos_Helpers
		 */
		public $helpers;

		/**
		 * EQUIPOS settings object.
		 *
		 * @access	public
		 * @since	1.1.0
		 * @var		object|Equipos_Settings
		 */
		public $settings;

		/**
		 * Throw error on object clone.
		 *
		 * Cloning instances of the class is forbidden.
		 *
		 * @access	public
		 * @since	1.1.0
		 * @return	void
		 */
		public function __clone() {
			_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to clone this class.', 'equipos' ), '1.1.0' );
		}

		/**
		 * Disable unserializing of the class.
		 *
		 * @access	public
		 * @since	1.1.0
		 * @return	void
		 */
		public function __wakeup() {
			_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to unserialize this class.', 'equipos' ), '1.1.0' );
		}

		/**
		 * Main Equipos Instance.
		 *
		 * Insures that only one instance of Equipos exists in memory at any one
		 * time. Also prevents needing to define globals all over the place.
		 *
		 * @access		public
		 * @since		1.1.0
		 * @static
		 * @return		object|Equipos	The one true Equipos
		 */
		public static function instance() {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Equipos ) ) {
				self::$instance					= new Equipos;
				self::$instance->base_hooks();
				self::$instance->includes();
				self::$instance->helpers		= new Equipos_Helpers();
				self::$instance->settings		= new Equipos_Settings();

				//Fire the plugin logic
				new Equipos_Run();

				/**
				 * Fire a custom action to allow dependencies
				 * after the successful plugin setup
				 */
				do_action( 'EQUIPOS/plugin_loaded' );
			}

			return self::$instance;
		}

		/**
		 * Include required files.
		 *
		 * @access  private
		 * @since   1.1.0
		 * @return  void
		 */
		private function includes() {
			require_once EQUIPOS_PLUGIN_DIR . 'core/includes/classes/class-equipos-helpers.php';
			require_once EQUIPOS_PLUGIN_DIR . 'core/includes/classes/class-equipos-settings.php';

			require_once EQUIPOS_PLUGIN_DIR . 'core/includes/classes/class-equipos-run.php';
		}

		/**
		 * Add base hooks for the core functionality
		 *
		 * @access  private
		 * @since   1.1.0
		 * @return  void
		 */
		private function base_hooks() {
			add_action( 'plugins_loaded', array( self::$instance, 'load_textdomain' ) );
		}

		/**
		 * Loads the plugin language files.
		 *
		 * @access  public
		 * @since   1.1.0
		 * @return  void
		 */
		public function load_textdomain() {
			load_plugin_textdomain( 'equipos', FALSE, dirname( plugin_basename( EQUIPOS_PLUGIN_FILE ) ) . '/languages/' );
		}

	}

endif; // End if class_exists check.