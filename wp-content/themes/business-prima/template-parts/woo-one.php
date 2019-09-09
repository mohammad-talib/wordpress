<div class="wooOneContainer">

	<div class="wooOneWelcomeContainer">
		
			<?php
			
				$business_primaWelcomePostTitle = '';
				$business_primaWelcomePostDesc = '';
				$business_primaWelcomePostContent = '';

				if( '' != get_theme_mod('business_prima_wooone_welcome_post') && 'select' != get_theme_mod('business_prima_wooone_welcome_post') ){

					$business_primaWelcomePostId = get_theme_mod('business_prima_wooone_welcome_post');

					if( ctype_alnum($business_primaWelcomePostId) ){

						$business_primaWelcomePost = get_post( $business_primaWelcomePostId );

						$business_primaWelcomePostTitle = $business_primaWelcomePost->post_title;
						$business_primaWelcomePostDesc = $business_primaWelcomePost->post_excerpt;
						$business_primaWelcomePostContent = $business_primaWelcomePost->post_content;

					}

				}			
			
			?>
			
			<h1><?php echo esc_html($business_primaWelcomePostTitle); ?></h1>
			<div class="wooOneWelcomeContent">
				<p>
					<?php 
					
						if( '' != $business_primaWelcomePostDesc ){
							
							echo esc_html($business_primaWelcomePostDesc);
							
						}else{
							
							echo esc_html($business_primaWelcomePostContent);
							
						}
					
					?>
				</p>
			</div><!-- .wooOneWelcomeContent -->	
		
	</div><!-- .wooOneWelcomeContainer -->
	
	
	<div class="new-arrivals-container">
		
		<?php 
					
			if( 'no' != get_theme_mod('business_prima_show_wooone_heading') ): 
			
				$business_primaWooOneLatestHeading = __('Latest Products', 'business-prima');	
				$business_primaWooOneLatestText = __('Some of our latest products', 'business-prima');
			
					
				if( '' != get_theme_mod('business_prima_wooone_latest_heading') ){
					$business_primaWooOneLatestHeading = get_theme_mod('business_prima_wooone_latest_heading');
				}
				
				if( '' != get_theme_mod('business_prima_wooone_latest_text') ){
					$business_primaWooOneLatestText = get_theme_mod('business_prima_wooone_latest_text');
				}				
			
					
		?>
		<div class="new-arrivals-title">
		
			<h3><?php echo esc_html($business_primaWooOneLatestHeading); ?></h3>
			<p><?php echo esc_html($business_primaWooOneLatestText); ?></p>
		
		</div><!-- .new-arrivals-title -->
		<?php endif; ?>
		
		<?php
			
			$business_primaWooOnePaged = get_query_var( 'page' ) ? get_query_var( 'page' ) : 1;
			
			$business_prima_front_page_ecom = array(
				'post_type' => 'product',
				'paged' => $business_primaWooOnePaged
			);
			$business_prima_front_page_ecom_the_query = new WP_Query( $business_prima_front_page_ecom );
			
			$business_prima_front_page_temp_query = $wp_query;
			$wp_query   = NULL;
			$wp_query   = $business_prima_front_page_ecom_the_query;
			
		?>		
		
		<div class="new-arrivals-content">
		<?php if ( have_posts() && post_type_exists('product') ) : ?>
		
		
			<div class="business_prima-woocommerce-content">
			
				<ul class="products">
			
					<?php /* Start the Loop */ ?>
					<?php while ( $business_prima_front_page_ecom_the_query->have_posts() ) : $business_prima_front_page_ecom_the_query->the_post(); ?>			
					<?php wc_get_template_part( 'content', 'product' ); ?>
					<?php endwhile; ?>
				
				</ul><!-- .products -->
				
				<?php //the_posts_navigation(); ?>
				
				<?php business_prima_pagination( $business_primaWooOnePaged, $business_prima_front_page_ecom_the_query->max_num_pages); // Pagination Function ?>
				
			</div><!-- .business_prima-woocommerce-content -->
			
		<?php else : ?>
		
			<p><?php echo __('Please install wooCommerce and add products.', 'business-prima') ?></p>

		<?php 
			
			endif; 
			wp_reset_postdata();
			$wp_query = NULL;
			$wp_query = $business_prima_front_page_temp_query;
		?>			
		
		
		</div><!-- .new-arrivals-content -->		
	
	</div><!-- .new-arrivals-container -->	

</div>