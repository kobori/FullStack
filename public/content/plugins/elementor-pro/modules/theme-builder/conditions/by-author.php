<?php
namespace ElementorPro\Modules\ThemeBuilder\Conditions;

use ElementorPro\Modules\QueryControl\Module as QueryModule;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class By_Author extends Condition_Base {

	public static function get_type() {
		return 'singular';
	}

	public function get_name() {
		return 'by_author';
	}

	public static function get_priority() {
		return 50;
	}

	public function get_label() {
		return __( 'By Author', 'elementor-pro' );
	}

	public function check( $args = null ) {
		return get_post_field( 'post_author' ) === $args['id'];
	}

	protected function _register_controls() {
		$this->add_control(
			'author_id',
			[
				'section' => 'settings',
				'type' => QueryModule::QUERY_CONTROL_ID,
				'select2options' => [
					'dropdownCssClass' => 'elementor-conditions-select2-dropdown',
				],
				'filter_type' => 'author',
				'object_type' => $this->get_name(),
			]
		);
	}
}
