<div class="businessPrimaSevenContainer">

	<?php if( '' != get_theme_mod('business_prima_seven_welcome_post') && 'select' != get_theme_mod('business_prima_seven_welcome_post') ) : 

			$business_prima_SevenWelcomePostTitle = '';
			$business_prima_SevenWelcomePostDesc = '';
			$business_prima_SevenWelcomePostContent = '';


			$business_prima_SevenWelcomePostId = get_theme_mod('business_prima_seven_welcome_post');

			if( ctype_alnum($business_prima_SevenWelcomePostId) ){

				$business_prima_SevenWelcomePost = get_post( $business_prima_SevenWelcomePostId );

				$business_prima_SevenWelcomePostTitle = $business_prima_SevenWelcomePost->post_title;
				$business_prima_SevenWelcomePostDesc = $business_prima_SevenWelcomePost->post_excerpt;
				$business_prima_SevenWelcomePostContent = $business_prima_SevenWelcomePost->post_content;

			}			

	?>

	<div class="businessPrimaSevenWelcome">

		<h2><?php echo esc_html($business_prima_SevenWelcomePostTitle); ?></h2>
		<p>
		<?php 

			if( '' != $business_prima_SevenWelcomePostDesc ){

				echo esc_html($business_prima_SevenWelcomePostDesc);

			}else{

				echo esc_html($business_prima_SevenWelcomePostContent);

			}

		?>			
		</p>

	</div>	
	
	<?php endif; ?>
	
	<div class="businessPrimaSevenWork">
	
		<?php if( '' != get_theme_mod('business_prima_seven_work_post') && 'select' != get_theme_mod('business_prima_seven_work_post') ) : 

				$business_prima_SevenWorkPostTitle = '';
				$business_prima_SevenWorkPostDesc = '';
				$business_prima_SevenWorkPostContent = '';


				$business_prima_SevenWorkPostId = get_theme_mod('business_prima_seven_work_post');

				if( ctype_alnum($business_prima_SevenWorkPostId) ){

					$business_prima_SevenWorkPost = get_post( $business_prima_SevenWorkPostId );

					$business_prima_SevenWorkPostTitle = $business_prima_SevenWorkPost->post_title;
					$business_prima_SevenWorkPostDesc = $business_prima_SevenWorkPost->post_excerpt;
					$business_prima_SevenWorkPostContent = $business_prima_SevenWorkPost->post_content;

				}			

		?>

		<div class="businessPrimaSevenWorkPost">

			<h2><?php echo esc_html($business_prima_SevenWorkPostTitle); ?></h2>
			<p>
			<?php 

				if( '' != $business_prima_SevenWorkPostDesc ){

					echo esc_html($business_prima_SevenWorkPostDesc);

				}else{

					echo esc_html($business_prima_SevenWorkPostContent);

				}

			?>			
			</p>

		</div>	

		<?php endif; ?>
		
		<?php if( '' != get_theme_mod('business_prima_seven_portfolio_cat') && 'select' != get_theme_mod('business_prima_seven_portfolio_cat') ) : 
		?>
		<div class="businessPrimaSevenWorkItems">
		
			<?php 
			
				$business_prima_Seven_cat = '';

				if(get_theme_mod('business_prima_seven_portfolio_cat')){
						$business_prima_Seven_cat = get_theme_mod('business_prima_seven_portfolio_cat');
				}else{
						$business_prima_Seven_cat = 0;
				}

				if(get_theme_mod('business_prima_seven_work_num')){
						$business_prima_Seven_cat_num = get_theme_mod('business_prima_seven_work_num');
				}else{
						$business_prima_Seven_cat_num = 8;
				}		

				$business_prima_Seven_args = array(
					   // Change these category SLUGS to suit your use.
					   'ignore_sticky_posts' => 1,
					   'post_type' => array('post'),
					   'posts_per_page'=> $business_prima_Seven_cat_num,
					   'cat' => $business_prima_Seven_cat
				);

				$business_prima_Seven = new WP_Query($business_prima_Seven_args);		

				if ( $business_prima_Seven->have_posts() ) : while ( $business_prima_Seven->have_posts() ) : $business_prima_Seven->the_post();			
			
			?>
			<div class="businessPrimaSevenWorkItem">
			
				<a href="<?php echo esc_url( get_permalink() ); ?>">
				<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail('business_prima-home-posts');
					}else{
						echo '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/frontsix.png" />';
					}						
				?>
				</a>
				
			</div>
			<?php endwhile; wp_reset_postdata(); endif;?>
		
		</div>
		<?php endif; ?>
	
	</div>
	
	<?php if( '' != get_theme_mod('business_prima_seven_about_post') && 'select' != get_theme_mod('business_prima_seven_about_post') ) : 

			$business_prima_SevenAboutPostTitle = '';
			$business_prima_SevenAboutPostDesc = '';
			$business_prima_SevenAboutPostContent = '';


			$business_prima_SevenAboutPostId = get_theme_mod('business_prima_seven_about_post');

			if( ctype_alnum($business_prima_SevenAboutPostId) ){

				$business_prima_SevenAboutPost = get_post( $business_prima_SevenAboutPostId );

				$business_prima_SevenAboutPostTitle = $business_prima_SevenAboutPost->post_title;
				$business_prima_SevenAboutPostDesc = $business_prima_SevenAboutPost->post_excerpt;
				$business_prima_SevenAboutPostContent = $business_prima_SevenAboutPost->post_content;

			}			

	?>

	<div class="businessPrimaSevenAbout">

		<h2><?php echo esc_html($business_prima_SevenAboutPostTitle); ?></h2>
		<p>
		<?php 

			if( '' != $business_prima_SevenAboutPostDesc ){

				echo esc_html($business_prima_SevenAboutPostDesc);

			}else{

				echo esc_html($business_prima_SevenAboutPostContent);

			}

		?>			
		</p>

	</div>	
	
	<?php endif; ?>	
	
</div>	