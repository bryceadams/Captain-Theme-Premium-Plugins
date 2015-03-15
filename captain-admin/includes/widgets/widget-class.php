<?php
/* Let's Make Some Widgets */

add_action('wp_dashboard_setup', array('My_Dashboard_Widget','init') );

class My_Dashboard_Widget {

    /**
     * Hook to wp_dashboard_setup to add the widget.
     */
    public static function init() {

        // ADD CUSTOM DOMAINS TO IDS BELOW / CLASSES ETC.

        // Custom Widget #1
        if ( get_field('enable_custom_widget','option') ) {
            // Register the Custom Widget
            add_meta_box(
                'custom_widget',
                get_field('widget_title','option'),
                array('My_Dashboard_Widget','widget_custom'),
                'dashboard',
                'normal',
                'high'
            );
        }

        // Custom Widget #2
        if ( get_field('enable_custom_widget_2','option') ) {
            // Register the Custom Widget
            add_meta_box(
                'custom_widget_2',
                get_field('widget_title_2','option'),
                array('My_Dashboard_Widget','widget_custom_2'),
                'dashboard',
                'normal',
                'high'
            );
        }

        // Custom Widget #3
        if ( get_field('enable_custom_widget_3','option') ) {
            // Register the Custom Widget
            add_meta_box(
                'custom_widget_3',
                get_field('widget_title_3','option'),
                array('My_Dashboard_Widget','widget_custom_3'),
                'dashboard',
                'normal',
                'high'
            );
        }

    // Let's Hide for Subscribers
    if (current_user_can('edit_posts')) {
        // Register Total Posts Widget - we'll use add_meta_box so that it can be given a high priority for positioning
        add_meta_box(
            'total_posts_widget',
            __( 'Total Posts Widget', 'cadmin' ),
            array('My_Dashboard_Widget','widget_total_posts'),
           'dashboard',
           'normal',
           'high'         
        );

        // Write a Post Widget
        add_meta_box(
            'write_a_post_widget',
            __( 'Write a Post Widget', 'cadmin' ),
            array('My_Dashboard_Widget','widget_write_a_post'),
           'dashboard',
           'normal',
           'high'         
        );

        // Write a Page Widget
        add_meta_box(
            'write_a_page_widget',
            __( 'Write a Page Widget', 'cadmin' ),
            array('My_Dashboard_Widget','widget_write_a_page'),
           'dashboard',
           'normal',
           'high'         
        );
    }

    }

    
    // Custom Dashboard Widget Content #1
    public static function widget_custom() {
        the_field('widget_content','option');
    }

     // Custom Dashboard Widget Content #2
    public static function widget_custom_2() {
        the_field('widget_content_2','option');
    }

     // Custom Dashboard Widget Content #3
    public static function widget_custom_3() {
        the_field('widget_content_3','option');
    }

    // Total Posts Widget Content
    public static function widget_total_posts() { ?>
        <div class="stats-icon">
            <i class="dashicons dashicons-chart-bar"></i>
        </div>
        <div class="post-stats">

            <?php foreach ( array( 'post', 'page' ) as $post_type ) {
                $num_posts = wp_count_posts( $post_type );
                if ( $num_posts && $num_posts->publish ) {
                    if ( 'post' == $post_type ) {
                        $text = _n( '<span><i class="dashicons dashicons-edit"></i>%s</span> Post', '<span><i class="dashicons dashicons-edit"></i>%s</span> Posts', $num_posts->publish );
                    } else {
                        $text = _n( '<span><i class="dashicons dashicons-media-text"></i>%s</span> Page', '<span><i class="dashicons dashicons-media-text"></i>%s</span> Pages', $num_posts->publish );
                    }
                    $text = sprintf( $text, number_format_i18n( $num_posts->publish ) );
                    $post_type_object = get_post_type_object( $post_type );
                    if ( $post_type_object ) {
                        printf( '<div class="total-%1$s"><a href="edit.php?post_type=%1$s">%2$s</a></div>', $post_type, $text );
                    } else {
                        printf( '<span>%2$s</span>', $post_type, $text );
                    }

                }
            } ?>

            <div class="total-comments">
                <?php
                $num_comm = wp_count_comments();
                if ( $num_comm && $num_comm->total_comments ) {
                    $text = sprintf( _n( '<span><i class="dashicons dashicons-admin-comments"></i>%s</span> Comment', '<span><i class="dashicons dashicons-admin-comments"></i>%s</span> Comments', $num_comm->total_comments ), number_format_i18n( $num_comm->total_comments ) );
                    ?>
                    <a href="edit-comments.php"><?php echo $text; ?></a>
                <?php
                } ?>
            </div>

        </div>
    <?php }

    public static function widget_write_a_post() { ?>

        <a href="post-new.php"><span class="dashicons dashicons-edit"></span> <span class="write-post-text">Write a Post</span></a>

    <?php }

    public static function widget_write_a_page() { ?>

        <a href="post-new.php?post_type=page"><span class="dashicons dashicons-welcome-add-page"></span> <span class="write-post-text">Write a Page</span></a>

    <?php }

}