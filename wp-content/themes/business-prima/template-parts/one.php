<div class="businessPrimaOneContainer">
	
	<?php if( '' != get_theme_mod('business_prima_one_welcome_post') && 'select' != get_theme_mod('business_prima_one_welcome_post') ) : 

			$business_prima_OneWelcomePostTitle = '';
			$business_prima_OneWelcomePostDesc = '';
			$business_prima_OneWelcomePostContent = '';


			$business_prima_OneWelcomePostId = get_theme_mod('business_prima_one_welcome_post');

			if( ctype_alnum($business_prima_OneWelcomePostId) ){

				$business_prima_OneWelcomePost = get_post( $business_prima_OneWelcomePostId );

				$business_prima_OneWelcomePostTitle = $business_prima_OneWelcomePost->post_title;
				$business_prima_OneWelcomePostDesc = $business_prima_OneWelcomePost->post_excerpt;
				$business_prima_OneWelcomePostContent = $business_prima_OneWelcomePost->post_content;

			}			

	?>

	<div class="businessPrimaOneWelcome">

		<h2><?php echo esc_html($business_prima_OneWelcomePostTitle); ?></h2>
		<p>
		<?php 

			if( '' != $business_prima_OneWelcomePostDesc ){

				echo esc_html($business_prima_OneWelcomePostDesc);

			}else{

				echo esc_html($business_prima_OneWelcomePostContent);

			}

		?>			
		</p>

	</div>	
	
	<?php endif; ?>
	
	<?php
		if( '' != get_theme_mod('business_prima_one_services_cat') && 'select' != get_theme_mod('business_prima_one_services_cat') ):
	?>
	<div class="businessPrimaOneServices">
		
		<?php

			$business_prima_one_cat = '';

			if(get_theme_mod('business_prima_one_services_cat')){
					$business_prima_one_cat = get_theme_mod('business_prima_one_services_cat');
			}else{
					$business_prima_one_cat = 0;
			}
		
			if(get_theme_mod('business_prima_one_services_num')){
					$business_prima_one_cat_num = get_theme_mod('business_prima_one_services_num');
			}else{
					$business_prima_one_cat_num = 4;
			}		

			$business_prima_one_args = array(
				   // Change these category SLUGS to suit your use.
				   'ignore_sticky_posts' => 1,
				   'post_type' => array('post'),
				   'posts_per_page'=> $business_prima_one_cat_num,
				   'cat' => $business_prima_one_cat
			);

			$business_prima_one = new WP_Query($business_prima_one_args);		

			if ( $business_prima_one->have_posts() ) : while ( $business_prima_one->have_posts() ) : $business_prima_one->the_post();
		
   		?>		
	
		<div class="businessPrimaOneServicesItem">
			
			<div class="businessPrimaOneServicesItemImage">
			
				<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('business_prima-home-posts');
						}else{
							echo '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/frontsix.png" />';
						}						
				?>
				
			</div>
			
			<div class="businessPrimaOneServicesItemContent">
			
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