<?php
if ( ! class_exists( 'Fact_News_Featured_Posts_Widget' ) ) {
	/**
	 * Adds Fact News Featured Posts Widget.
	 */
	class Fact_News_Featured_Posts_Widget extends WP_Widget {

		/**
		 * Register widget with WordPress.
		 */
		public function __construct() {
			$featured_posts_widget = array(
				'classname'   => 'widget adore-widget featured-widget ',
				'description' => __( 'Retrive Featured Posts Widgets', 'fact-news' ),
			);
			parent::__construct(
				'fact_news_featured_posts_widget',
				__( 'Adore Widget: Featured Posts Widget', 'fact-news' ),
				$featured_posts_widget
			);
		}

		/**
		 * Front-end display of widget.
		 *
		 * @see WP_Widget::widget()
		 *
		 * @param array $args     Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		public function widget( $args, $instance ) {
			if ( ! isset( $args['widget_id'] ) ) {
				$args['widget_id'] = $this->id;
			}
			$featured_posts_title       = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
			$featured_posts_title       = apply_filters( 'widget_title', $featured_posts_title, $instance, $this->id_base );
			$viewall_button_label       = ( ! empty( $instance['view_all_button_label'] ) ) ? $instance['view_all_button_label'] : '';
			$featured_posts_post_offset = isset( $instance['offset'] ) ? absint( $instance['offset'] ) : '';
			$featured_posts_category    = isset( $instance['category'] ) ? absint( $instance['category'] ) : '';
			$viewall_button_link        = ( ! empty( $instance['view_all_button_link'] ) ) ? $instance['view_all_button_link'] : esc_url( get_category_link( $featured_posts_category ) );
			$featured_posts_orderby     = isset( $instance['orderby'] ) && in_array( $instance['orderby'], array( 'title', 'date' ) ) ? $instance['orderby'] : 'date';
			$featured_posts_order       = isset( $instance['order'] ) && in_array( $instance['order'], array( 'asc', 'desc' ) ) ? $instance['order'] : 'desc';
			$featured_posts_style       = isset( $instance['style'] ) ? $instance['style'] : 'style-1';
			$args['before_widget']      = str_replace( 'widget adore-widget featured-widget ', 'widget adore-widget featured-widget ' . $featured_posts_style, $args['before_widget'] );
			echo $args['before_widget'];
			?>
			<div class="widget-header">
				<?php
				if ( ! empty( $featured_posts_title ) ) {
					echo $args['before_title'] . esc_html( $featured_posts_title ) . $args['after_title'];
				}
				if ( ! empty( $viewall_button_label ) ) {
					?>
					<a href="<?php echo esc_url( $viewall_button_link ); ?>"><?php echo esc_html( $viewall_button_label ); ?></a>
				<?php } ?>
			</div>
			<div class="adore-widget-body">
				<?php
				$featured_posts_widgets_args = array(
					'post_type'      => 'post',
					'posts_per_page' => absint( 4 ),
					'offset'         => absint( $featured_posts_post_offset ),
					'orderby'        => $featured_posts_orderby,
					'order'          => $featured_posts_order,
					'cat'            => absint( $featured_posts_category ),
				);
				$query                       = new WP_Query( $featured_posts_widgets_args );
				if ( $query->have_posts() ) :
					while ( $query->have_posts() ) :
						$query->the_post();
						?>
						<div class="post-item post-list">
							<div class="post-item-image">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail(); ?>					
								</a>
							</div>
							<div class="post-item-content">
								<h3 class="entry-title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h3> 
								<ul class="entry-meta">
									<li class="post-author"> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span class="far fa-user"></span><?php echo esc_html( get_the_author() ); ?></a></li>
									<li class="post-date"> <span class="far fa-calendar-alt"></span><?php echo esc_html( get_the_date() ); ?></li>
									<li class="post-comment"> <span class="far fa-comment"></span><?php echo absint( get_comments_number( get_the_ID() ) ); ?></li>
								</ul>
								<div class="post-exerpt">
									<p><?php echo wp_kses_post( wp_trim_words( get_the_content(), 30 ) ); ?></p>
								</div>
							</div>
						</div>
						<?php
					endwhile;
					wp_reset_postdata();
				endif;
				?>
			</div>
			<?php
			echo $args['after_widget'];
		}

		/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 */
		public function form( $instance ) {
			$featured_posts_title       = isset( $instance['title'] ) ? $instance['title'] : '';
			$viewall_button_label       = isset( $instance['view_all_button_label'] ) ? $instance['view_all_button_label'] : '';
			$viewall_button_link        = isset( $instance['view_all_button_link'] ) ? $instance['view_all_button_link'] : '';
			$featured_posts_post_offset = isset( $instance['offset'] ) ? absint( $instance['offset'] ) : '';
			$featured_posts_category    = isset( $instance['category'] ) ? absint( $instance['category'] ) : '';
			$featured_posts_style       = isset( $instance['style'] ) ? $instance['style'] : 'style-1';
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>"><?php esc_html_e( 'Select Style:', 'fact-news' ); ?></label>
				<select id="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'style' ) ); ?>" class="widefat" style="width:100%;">
					<option value="style-1" <?php selected( 'style-1', $featured_posts_style ); ?>><?php esc_html_e( 'Style 1', 'fact-news' ); ?></option>
					<option value="style-3" <?php selected( 'style-3', $featured_posts_style ); ?>><?php esc_html_e( 'Style 2', 'fact-news' ); ?></option>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Section Title:', 'fact-news' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $featured_posts_title ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'view_all_button_label' ) ); ?>"><?php esc_html_e( 'View All Button:', 'fact-news' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'view_all_button_label' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'view_all_button_label' ) ); ?>" type="text" value="<?php echo esc_attr( $viewall_button_label ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'view_all_button_link' ) ); ?>"><?php esc_html_e( 'View All Button URL:', 'fact-news' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'view_all_button_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'view_all_button_link' ) ); ?>" type="text" value="<?php echo esc_attr( $viewall_button_link ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>"><?php esc_html_e( 'Number of posts to displace or pass over:', 'fact-news' ); ?></label>
				<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'offset' ) ); ?>" type="number" step="1" min="0" value="<?php echo absint( $featured_posts_post_offset ); ?>" size="3" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'Select the category to show posts:', 'fact-news' ); ?></label>
				<select id="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'category' ) ); ?>" class="widefat" style="width:100%;">
					<?php
					$categories = fact_news_get_post_cat_choices();
					foreach ( $categories as $category => $value ) {
						?>
						<option value="<?php echo absint( $category ); ?>" <?php selected( $featured_posts_category, $category ); ?>><?php echo esc_html( $value ); ?></option>
					<?php } ?>      
				</select>
			</p>
			<?php
		}

		/**
		 * Sanitize widget form values as they are saved.
		 *
		 * @see WP_Widget::update()
		 *
		 * @param array $new_instance Values just sent to be saved.
		 * @param array $old_instance Previously saved values from database.
		 *
		 * @return array Updated safe values to be saved.
		 */
		public function update( $new_instance, $old_instance ) {
			$instance                          = $old_instance;
			$instance['title']                 = sanitize_text_field( $new_instance['title'] );
			$instance['view_all_button_label'] = sanitize_text_field( $new_instance['view_all_button_label'] );
			$instance['view_all_button_link']  = esc_url_raw( $new_instance['view_all_button_link'] );
			$instance['offset']                = (int) $new_instance['offset'];
			$instance['category']              = (int) $new_instance['category'];
			$instance['style']                 = wp_strip_all_tags( $new_instance['style'] );
			return $instance;
		}

	}
}
