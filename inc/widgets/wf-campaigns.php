<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class WF_Campaigns_Widget extends Widget_Base {

  public $base;

    public function get_name() {
        return 'wf-campaigns';
    }

    public function get_title() {
        return esc_html__( 'WP Fundraising Campaigns', 'wp-fundraising' );
    }

    public function get_icon() {
        return 'eicon-posts-grid';
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Product element', 'wp-fundraising'),
            ]
        );

        $this->add_control(
            'donation',
            [
                'label' =>esc_html__( 'Show Only Charitable Campaigns', 'wp-fundraising' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
                'label_on' =>esc_html__( 'Show', 'wp-fundraising' ),
                'label_off' =>esc_html__( 'Hide', 'wp-fundraising' ),
            ]
        );
        $this->add_control(
            'style',
            [
                'label'     => esc_html__( 'Style', 'wp-fundraising' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 1,
                'options'   => [
                    '1'     => esc_html__( 'style 1', 'wp-fundraising' ),
                    '2'     => esc_html__( 'style 2', 'wp-fundraising' ),
                    '3'     => esc_html__( 'style 3', 'wp-fundraising' ),
                    '4'     => esc_html__( 'style 4', 'wp-fundraising' ),
                ],
            ]
        );

        $this->add_control(
          'post_count',
          [
            'label'         => esc_html__( 'Post count', 'wp-fundraising' ),
            'type'          => Controls_Manager::NUMBER,
            'default'       => esc_html__( '3', 'wp-fundraising' ),

          ]
        );
        
        $this->add_control(
            'count_col',
            [
                'label'     => esc_html__( 'Select Column', 'wp-fundraising' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 4,
                'options'   => [
                        '2'     => esc_html__( '2 Column', 'wp-fundraising' ),
                        '3'     => esc_html__( '3 Column', 'wp-fundraising' ),
                        '4'     => esc_html__( '4 Column', 'wp-fundraising' ),
                    ],
            ]
        );

        $this->add_control(
            'xs_post_cat', [
                'label'			 =>esc_html__( 'Category', 'wp-fundraising' ),
                'type'			 => Controls_Manager::TEXT,
                'label_block'	 => true,
                'placeholder'	 =>esc_html__('design,fashion', 'wp-fundraising' ),
                'desc'          => esc_html__('add you multiple category use comma separator', 'wp-fundraising')
            ]
        );
        $this->add_control(
            'show_author',
            [
                'label' =>esc_html__( 'Show Author', 'wp-fundraising' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' =>esc_html__( 'Show', 'wp-fundraising' ),
                'label_off' =>esc_html__( 'Hide', 'wp-fundraising' ),
            ]
        );
        $this->add_control(
            'show_filter',
            [
                'label' =>esc_html__( 'Show Filter', 'wp-fundraising' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
                'label_on' =>esc_html__( 'Show', 'wp-fundraising' ),
                'label_off' =>esc_html__( 'Hide', 'wp-fundraising' ),
            ]
        );

        $this->add_control(
            'status',
            [
                'label'     => esc_html__( 'Status', 'wp-fundraising' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 4,
                'options'   => [
                    'Success'     => esc_html__( 'successful', 'wp-fundraising' ),
                    'expired'     => esc_html__( 'expired', 'wp-fundraising' ),
                    'valid'     => esc_html__( 'valid', 'wp-fundraising' ),
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render( ) {
        $settings = $this->get_settings();

        $xs_post_cat = $settings['xs_post_cat'];
        $count_col = $settings['count_col'];
        $post_count = $settings['post_count'];
        $styles = $settings['style'] . '"';
        $show_filter = $settings['show_filter'];
        $author = $settings['show_author'];
        $status = $settings['status'];
        $donation = $settings['donation'];

        ?>
        <div class="xs-wp-fundraising-listing-style-<?php echo esc_attr($styles);?>">
            <?php
                $style = ($styles == 4 ) ? $style = 1 : $style = $styles;
                echo do_shortcode('[wp_fundraising_listing cat="'.$xs_post_cat.'" number="' . $post_count . '" col="'.$count_col.'" style="'.$style.'" filter="'.$show_filter.'" "'.$author.'" donation="'.$donation.'" status="'.$status.'"]');
            ?>
        </div>
    <?php
    }

    protected function _content_template() { }
}