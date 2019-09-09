<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="<?php bloginfo('charset'); ?>">
	<?php wp_head(); ?>

	<?php
	// social icon
	$cryptocurrency_exchange_fb_link_disable      			= 	get_theme_mod('cryptocurrency_exchange_fb_link_disable', '1');
	$cryptocurrency_exchange_facebook_url      				= 	get_theme_mod('cryptocurrency_exchange_facebook_url', '#');
	$cryptocurrency_exchange_tweet_link_disable   			= 	get_theme_mod('cryptocurrency_exchange_tweet_link_disable', '1');
	$cryptocurrency_exchange_twitter_url   					= 	get_theme_mod('cryptocurrency_exchange_twitter_url', '#');
	$cryptocurrency_exchange_insta_link_disable   			= 	get_theme_mod('cryptocurrency_exchange_insta_link_disable', '1');
	$cryptocurrency_exchange_instagram_url   				= 	get_theme_mod('cryptocurrency_exchange_instagram_url', '#');
	$cryptocurrency_exchange_youtube_link_disable 			= 	get_theme_mod('cryptocurrency_exchange_youtube_link_disable', '1');
	$cryptocurrency_exchange_youtube_url 					= 	get_theme_mod('cryptocurrency_exchange_youtube_url', '#');
	
	$cryptocurrency_exchange_email_detaill 	= get_theme_mod('cryptocurrency_email_detaill', '')
	
	?>
</head>

<body <?php body_class(); ?>>
	<main>
	<!--Header Info-->	
	<header class="header-info">
		<div class="container">
			<div class="row header-inner">
				<div class="col-md-4">
					<ul class="social-icons">
						<?php if($cryptocurrency_exchange_fb_link_disable != '1' && $cryptocurrency_exchange_facebook_url != '') { ?><li><a href="<?php echo esc_url(get_theme_mod('cryptocurrency_exchange_facebook_url', '')); ?>"><span class="fa fa-facebook"></span></a></li><?php } ?>
						<?php if($cryptocurrency_exchange_tweet_link_disable != '1' && $cryptocurrency_exchange_twitter_url != '') { ?><li><a href="<?php echo esc_url(get_theme_mod('cryptocurrency_exchange_twitter_url', '')); ?>"><span class="fa fa-twitter"></span></a></li><?php } ?>
						<?php if($cryptocurrency_exchange_insta_link_disable != '1' && $cryptocurrency_exchange_instagram_url != '') { ?><li><a href="<?php echo esc_url(get_theme_mod('cryptocurrency_exchange_instagram_url', '')); ?>"><span class="fa fa-instagram"></span></a></li><?php } ?>
						<?php if($cryptocurrency_exchange_youtube_link_disable != '1' && $cryptocurrency_exchange_youtube_url != '') { ?><li><a href="<?php echo esc_url(get_theme_mod('cryptocurrency_exchange_youtube_url', '')); ?>"><span class="fa fa-youtube"></span></a></li><?php } ?>
					</ul>
				</div>
				<div class="col-md-4">
					<?php
					$cryptocurrency_exchange_custom_logo_id = get_theme_mod( 'custom_logo' );
					$cryptocurrency_exchange_custom_logo_image = wp_get_attachment_image_src( $cryptocurrency_exchange_custom_logo_id , 'full' ); // logo image
					if ( has_custom_logo() ) {
							echo '<a href="'. esc_url(home_url( '/' )). '" class="logo-image navbar-brand">
									<img src="'. esc_url( $cryptocurrency_exchange_custom_logo_image[0] ) .'" />
								  </a>';
					} else {
							echo '<h1 class="logo-text"><a href="'. esc_url(home_url( '/' )). '" class="navbar-brand">'. esc_html(get_bloginfo( 'name' )) .'</a></h1>';
					}
					?>
				</div>
				<div class="col-md-4">
					<ul class="header-contact-info text-right">
						<?php if($cryptocurrency_exchange_email_detaill != "" ){ ?>
						<li>
							<span><i class="fa fa-envelope"></i><?php esc_html_e('Email : ','cryptocurrency-exchange') ?><a href="mailto:<?php echo esc_attr(get_theme_mod('cryptocurrency_email_detaill')); ?>"><?php echo esc_attr(get_theme_mod('cryptocurrency_email_detaill', '')); ?></a></span>
						</li>
						<?php } ?>
					</ul>
				</div>
				
			</div>
		</div>
	</header>
		<!--/End of Header Info-->

		<nav class="navbar-custom" role="navigation">
        <div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse">
					<span class="sr-only"><?php esc_attr('Toggle navigation','cryptocurrency-exchange') ?></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="custom-collapse">
				<?php
					$cryptocurrency_exchange_args = array(
						'theme_location'  	 => 'primary-menu',
						//'container'		 => false,
						'depth'              => 5,
						'menu_class'	 	 => 'nav navbar-nav navbar-center',
						'walker'		 	 => new cryptocurrency_exchange_Walker_Nav_Primary()
					);

					if (has_nav_menu('primary-menu')) {
						wp_nav_menu( $cryptocurrency_exchange_args ); 
					} 
				?>
			</div>
		</div>
    </nav>
	<div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>