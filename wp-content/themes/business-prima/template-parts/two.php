<div class="businessPrimaTwoContainer">
	
	<div class="businessPrimaTwoServices">
		
		<?php if( '' != get_theme_mod('business_prima_two_welcome_post') && 'select' != get_theme_mod('business_prima_two_welcome_post') ) : 

				$business_prima_TwoWelcomePostTitle = '';
				$business_prima_TwoWelcomePostDesc = '';
				$business_prima_TwoWelcomePostContent = '';


				$business_prima_TwoWelcomePostId = get_theme_mod('business_prima_two_welcome_post');

				if( ctype_alnum($business_prima_TwoWelcomePostId) ){

					$business_prima_TwoWelcomePost = get_post( $business_prima_TwoWelcomePostId );

					$business_prima_TwoWelcomePostTitle = $business_prima_TwoWelcomePost->post_title;
					$business_prima_TwoWelcomePostDesc = $business_prima_TwoWelcomePost->post_excerpt;
					$business_prima_TwoWelcomePostContent = $business_prima_TwoWelcomePost->post_content;

				}			

		?>

		<div class="businessPrimaTwoWelcome">

			<h2><?php echo esc_html($business_prima_TwoWelcomePostTitle); ?></h2>
			<p>
			<?php 

				if( '' != $business_prima_TwoWelcomePostDesc ){

					echo esc_html($business_prima_TwoWelcomePostDesc);

				}else{

					echo esc_html($business_prima_TwoWelcomePostContent);

				}

			?>			
			</p>

		</div>
		
		<?php endif; ?>
		
		<?php
			if( '' != get_theme_mod('business_prima_two_services_cat') && 'select' != get_theme_mod('business_prima_two_services_cat') ):
		?>
		<div class="businessPrimaTwoServicesItems">

			<?php

				$business_prima_Two_cat = '';

				if(get_theme_mod('business_prima_two_services_cat')){
						$business_prima_Two_cat = get_theme_mod('business_prima_two_services_cat');
				}else{
						$business_prima_Two_cat = 0;
				}

				if(get_theme_mod('business_prima_two_services_num')){
						$business_prima_Two_cat_num = get_theme_mod('business_prima_two_services_num');
				}else{
						$business_prima_Two_cat_num = 4;
				}		

				$business_prima_Two_args = array(
					   // Change these category SLUGS to suit your use.
					   'ignore_sticky_posts' => 1,
					   'post_type' => array('post'),
					   'posts_per_page'=> $business_prima_Two_cat_num,
					   'cat' => $business_prima_Two_cat
				);

				$business_prima_Two = new WP_Query($business_prima_Two_args);		

				if ( $business_prima_Two->have_posts() ) : while ( $business_prima_Two->have_posts() ) : $business_prima_Two->the_post();

			?>		

			<div class="businessPrimaTwoServicesItem">

				<div class="businessPrimaTwoServicesItemImage">

					<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail('business_prima-home-posts');
							}else{
								echo '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/frontsix.png" />';
							}						
					?>

				</div>

				<div class="businessPrimaTwoServicesItemContent">

					<?php the_title( '<h2><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>
					<p>
						<?php  

							//$frontPostExcerpt = '';
							//$frontPostExcerpt = get_the_excerpt();

							if( has_excerpt() ){
								echo esc_html(get_the_excerpt());
							}else{
								echo esc_html(business_prima_limitedstring(get_the_content(), 50));
							}

						?>
					</p>

				</div>			

			</div>
			<?php endwhile; wp_reset_postdata(); endif;?>

		</div>
		<?php endif; ?>		
		
	</div>
	
	<div class="businessPrimaTwoPortfolio">
		
		<div class="businessPrimaTwoPortfolioHeading">
			
			<?php 

				$business_prima_Two_PortfolioHeading = __('Portfolio', 'business-prima');	


				if( '' != get_theme_mod('business_prima_two_portfolio_title') ){
					$business_prima_Two_PortfolioHeading = get_theme_mod('business_prima_two_portfolio_title');
				}			

			?>
			<h3><?php echo esc_html($business_prima_Two_PortfolioHeading); ?></h3>
			
		</div>
		
		<div class="businessPrimaTwoPortfolioItems">

			<?php

				$business_prima_Two_port = '';

				if(get_theme_mod('business_prima_two_portfolio_cat')){
						$business_prima_Two_port = get_theme_mod('business_prima_two_portfolio_cat');
				}else{
						$business_prima_Two_port = 0;
				}

				if(get_theme_mod('business_prima_two_portfolio_num')){
						$business_prima_Two_port_num = get_theme_mod('business_prima_two_portfolio_num');
				}else{
						$business_prima_Two_port_num = 4;
				}		

				$business_prima_Two_port_args = array(
					   // Change these category SLUGS to suit your use.
					   'ignore_sticky_posts' => 1,
					   'post_type' => array('post'),
					   'posts_per_page'=> $business_prima_Two_port_num,
					   'cat' => $business_prima_Two_port
				);

				$business_prima_TwoPort = new WP_Query($business_prima_Two_port_args);		

				if ( $business_prima_TwoPort->have_posts() ) : while ( $business_prima_TwoPort->have_posts() ) : $business_prima_TwoPort->the_post();

			?>
			<div class="businessPrimaTwoPortfolioItem">
			
				<div class="businessPrimaTwoPortfolioItemImage">

				<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail('business_prima-home-posts');
					}else{
						echo '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/frontsix.png" />';
					}						
				?>

				</div>
				
				<?php the_title( '<h2><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>
				
			</div>
			<?php endwhile; wp_reset_postdata(); endif;?>
		
		</div>		
		
	</div>	
	
</div>