<?php

class Elementor_Timer_Widget extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'TimerWidget';
    }

    public function get_title()
    {
        return __('Timer Widget', 'timeelement');
    }

    public function get_icon()
    {
        return 'fa fa-clock-o';
    }

    public function get_categories()
    {
        return ['basic'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'timeelement'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control('display_type', [
            'label' => esc_html__('Display Type', 'timeelement'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'clock' => esc_html__('Clock', 'timeelement'),
                'timerc' => esc_html__('Time CountDown', 'timeelement'),
                'generic' => esc_html__('Normal CountDown', 'timeelement'),
            ],
            'default' => 'clock'
        ]);

        $this->add_control('clock_format', [
            'label' => esc_html__('Clock Format', 'timeelement'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'clock' => esc_html__('12', 'timeelement'),
                'timerc' => esc_html__('24', 'timeelement'),
            ],
            'default' => '12',
            'condition' => [
                'display_type' => 'clock'
            ]
        ]);

        $this->add_control('target_clock_time', [
            'label' => __('Target Time', 'timeelement'),
            'type' => \Elementor\Controls_Manager::DATE_TIME,
            'condition' => [
                'display_type' => 'timerc'
            ],
            'label_block' => false
        ]);

        $this->add_control('generic_countdown', [
            'label' => __('Countdown From', 'timeelement'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'condition' => [
                'display_type' => 'genericc'
            ],
            'label_block' => false
        ]);

        $this->add_control('decrement', [
            'label' => __('Decrease By (milliseconds)', 'timeelement'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'condition' => [
                'display_type' => 'genericc'
            ],
            'label_block' => false,
            'default' => 1000
        ]);

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $display_type = $this->get_settings('display_type');
        $clock_format = $this->get_settings('clock_format');
        $target_time = $this->get_settings('target_clock_time');
        $countdown = $this->get_settings('generic_countdown');
        $decrement = $this->get_settings('decrement');

?>
        <div class="clock" data-display-type="<?php echo $display_type ?>" data-clock-format="<?php echo $clock_format ?>" data-target-time="<?php echo $target_time; ?>" data-countdown="<?php echo $countdown; ?>" data-decrement="<?php echo $decrement; ?>">

        </div>
<?php
    }
}
