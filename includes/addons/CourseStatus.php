<?php
/**
 * Course Status
 * @since 1.0.0
 */

namespace TutorLMS\Elementor\Addons;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class CourseStatus extends BaseAddon {

    public function get_title() {
        return __('Course Status', 'tutor-elementor-addons');
    }
    
    protected function register_style_controls() {
        $selector = '{{WRAPPER}} .tutor-course-status';
        $title_selector = $selector.' .tutor-segment-title';
        $progress_txt_selector = $selector.' .tutor-progress-percent';

        /* Section Title */
        $this->start_controls_section(
            'course_status_title_section',
            [
                'label' => __('Section Title', 'tutor-elementor-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'course_status_title_color',
            [
                'label'     => __('Color', 'tutor-elementor-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
					$title_selector => 'color: {{VALUE}}',
				],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'course_status_title_typo',
                'label'     => __('Typography', 'tutor-elementor-addons'),
                'selector'  => $title_selector,
            ]
        );
        $this->end_controls_section();

        /* Section Bar */
        $this->start_controls_section(
            'course_status_bar_section',
            [
                'label' => __('Progress Bar', 'tutor-elementor-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'course_status_bar_color',
            [
                'label'     => __('Color', 'tutor-elementor-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
					$selector.' .tutor-progress-bar' => 'background-color: {{VALUE}}',
				],
            ]
        );
        $this->add_control(
            'course_status_bar_fill_color',
            [
                'label'     => __('Fill Color', 'tutor-elementor-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
					$selector.' .tutor-progress-filled' => 'background-color: {{VALUE}}',
				],
            ]
        );
        $this->add_control(
            'course_status_pointer_color',
            [
                'label'     => __('Pointer Color', 'tutor-elementor-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
					$selector.' .tutor-progress-filled:after' => 'border-color: {{VALUE}}',
				],
            ]
        );
        $this->end_controls_section();

        /* Section Progress Text */
        $this->start_controls_section(
            'course_status_progress_text_section',
            [
                'label' => __('Progress Text', 'tutor-elementor-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'course_status_progress_text_color',
            [
                'label'     => __('Color', 'tutor-elementor-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
					$progress_txt_selector => 'color: {{VALUE}}',
				],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'course_status_progress_text_typo',
                'label'     => __('Typography', 'tutor-elementor-addons'),
                'selector'  => $progress_txt_selector,
            ]
        );
        $this->end_controls_section();
    }

    protected function render($instance = []) {
        ob_start();
        if (\Elementor\Plugin::instance()->editor->is_edit_mode()) {
            include_once etlms_get_template('course/status-preview');
        } else if (is_user_logged_in() && tutils()->is_enrolled()) {
            include_once etlms_get_template('course/status');
        }
        echo ob_get_clean();
    }
}
