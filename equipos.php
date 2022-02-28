<?php
/**
 * Equipos
 *
 * @package       EQUIPOS
 * @author        Cristian Semeria
 * @license       gplv2-or-later
 * @version       1.1.0
 *
 * @wordpress-plugin
 * Plugin Name:   Equipos
 * Plugin URI:    https://grupohega.mx
 * Description:   Dar de alta equipos industriales
 * Version:       1.1.0
 * Author:        Cristian Semeria
 * Author URI:    https://semeria.mx
 * Text Domain:   equipos
 * Domain Path:   /languages
 * License:       GPLv2 or later
 * License URI:   https://www.gnu.org/licenses/gpl-2.0.html
 *
 * You should have received a copy of the GNU General Public License
 * along with Equipos. If not, see <https://www.gnu.org/licenses/gpl-2.0.html/>.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
// Plugin name
define( 'EQUIPOS_NAME',			'Equipos' );

// Plugin version
define( 'EQUIPOS_VERSION',		'1.1.0' );

// Plugin Root File
define( 'EQUIPOS_PLUGIN_FILE',	__FILE__ );

// Plugin base
define( 'EQUIPOS_PLUGIN_BASE',	plugin_basename( EQUIPOS_PLUGIN_FILE ) );

// Plugin Folder Path
define( 'EQUIPOS_PLUGIN_DIR',	plugin_dir_path( EQUIPOS_PLUGIN_FILE ) );

// Plugin Folder URL
define( 'EQUIPOS_PLUGIN_URL',	plugin_dir_url( EQUIPOS_PLUGIN_FILE ) );

/**
 * Load the main class for the core functionality
 */
require_once EQUIPOS_PLUGIN_DIR . 'core/class-equipos.php';

/**
 * The main function to load the only instance
 * of our master class.
 *
 * @author  Cristian Semeria
 * @since   1.1.0
 * @return  object|Equipos
 */
function EQUIPOS() {
	return Equipos::instance();
}
add_action( 'init', 'Agregar_equipos' );
function Agregar_equipos() {
	$labels = [
		'name'                     => esc_html__( 'Equipos', 'equiposmantenimiento' ),
		'singular_name'            => esc_html__( 'Equipos', 'equiposmantenimiento' ),
		'add_new'                  => esc_html__( 'Add New', 'equiposmantenimiento' ),
		'add_new_item'             => esc_html__( 'Add new equipos', 'equiposmantenimiento' ),
		'edit_item'                => esc_html__( 'Edit Equipos', 'equiposmantenimiento' ),
		'new_item'                 => esc_html__( 'New Equipos', 'equiposmantenimiento' ),
		'view_item'                => esc_html__( 'View Equipos', 'equiposmantenimiento' ),
		'view_items'               => esc_html__( 'View Equipos', 'equiposmantenimiento' ),
		'search_items'             => esc_html__( 'Search Equipos', 'equiposmantenimiento' ),
		'not_found'                => esc_html__( 'No equipos found', 'equiposmantenimiento' ),
		'not_found_in_trash'       => esc_html__( 'No equipos found in Trash', 'equiposmantenimiento' ),
		'parent_item_colon'        => esc_html__( 'Parent Equipos:', 'equiposmantenimiento' ),
		'all_items'                => esc_html__( 'All Equipos', 'equiposmantenimiento' ),
		'archives'                 => esc_html__( 'Equipos Archives', 'equiposmantenimiento' ),
		'attributes'               => esc_html__( 'Equipos Attributes', 'equiposmantenimiento' ),
		'insert_into_item'         => esc_html__( 'Insert into equipos', 'equiposmantenimiento' ),
		'uploaded_to_this_item'    => esc_html__( 'Uploaded to this equipos', 'equiposmantenimiento' ),
		'featured_image'           => esc_html__( 'Featured image', 'equiposmantenimiento' ),
		'set_featured_image'       => esc_html__( 'Set featured image', 'equiposmantenimiento' ),
		'remove_featured_image'    => esc_html__( 'Remove featured image', 'equiposmantenimiento' ),
		'use_featured_image'       => esc_html__( 'Use as featured image', 'equiposmantenimiento' ),
		'menu_name'                => esc_html__( 'Equipos', 'equiposmantenimiento' ),
		'filter_items_list'        => esc_html__( 'Filter equipos list', 'equiposmantenimiento' ),
		'filter_by_date'           => esc_html__( '', 'equiposmantenimiento' ),
		'items_list_navigation'    => esc_html__( 'Equipos list navigation', 'equiposmantenimiento' ),
		'items_list'               => esc_html__( 'Equipos list', 'equiposmantenimiento' ),
		'item_published'           => esc_html__( 'Equipos published', 'equiposmantenimiento' ),
		'item_published_privately' => esc_html__( 'Equipos published privately', 'equiposmantenimiento' ),
		'item_reverted_to_draft'   => esc_html__( 'Equipos reverted to draft', 'equiposmantenimiento' ),
		'item_scheduled'           => esc_html__( 'Equipos scheduled', 'equiposmantenimiento' ),
		'item_updated'             => esc_html__( 'Equipos updated', 'equiposmantenimiento' ),
		'text_domain'              => esc_html__( 'equiposmantenimiento', 'equiposmantenimiento' ),
	];
	$args = [
		'label'               => esc_html__( 'Equipos', 'equiposmantenimiento' ),
		'labels'              => $labels,
		'description'         => '',
		'public'              => true,
		'hierarchical'        => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => true,
		'query_var'           => true,
		'can_export'          => true,
		'delete_with_user'    => true,
		'has_archive'         => 'equipo',
		'rest_base'           => '',
		'show_in_menu'        => true,
		'menu_icon'           => 'dashicons-archive',
		'menu_position'       => '',
		'capability_type'     => 'post',
		'supports'            => ['title'],
		'taxonomies'          => [],
		'rewrite'             => [
			'slug'       => 'equipo-hega',
			'with_front' => false,
		],
	];

	register_post_type( 'equipos', $args );
}

EQUIPOS();