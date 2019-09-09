<?php

$business_primaPostsPagesArray = array(
	'select' => __('Select a post/page', 'business-prima'),
);

$business_primaPostsPagesArgs = array(
	
	// Change these category SLUGS to suit your use.
	'ignore_sticky_posts' => 1,
	'post_type' => array('post', 'page'),
	'orderby' => 'date',
	'posts_per_page' => -1,
	'post_status' => 'publish',
	
);
$business_primaPostsPagesQuery = new WP_Query( $business_primaPostsPagesArgs );
	
if ( $business_primaPostsPagesQuery->have_posts() ) :
							
	while ( $business_primaPostsPagesQuery->have_posts() ) : $business_primaPostsPagesQuery->the_post();
			
		$business_primaPostsPagesId = get_the_ID();
		if(get_the_title() != ''){
				$business_primaPostsPagesTitle = get_the_title();
		}else{
				$business_primaPostsPagesTitle = get_the_ID();
		}
		$business_primaPostsPagesArray[$business_primaPostsPagesId] = $business_primaPostsPagesTitle;
	   
	endwhile; wp_reset_postdata();
							
endif;

$business_primaYesNo = array(
	'select' => __('Select', 'business-prima'),
	'yes' => __('Yes', 'business-prima'),
	'no' => __('No', 'business-prima'),
);

$business_primaSliderType = array(
	'select' => __('Select', 'business-prima'),
	'header' => __('WP Custom Header', 'business-prima'),
	'owl' => __('Owl Slider', 'business-prima'),
);

$business_primaServiceLayouts = array(
	'select' => __('Select', 'business-prima'),
	'one' => __('One', 'business-prima'),
	'two' => __('Two', 'business-prima'),
);

$business_primaAvailableCats = array( 'select' => __('Select', 'business-prima') );

$business_prima_categories_raw = get_categories( array( 'orderby' => 'name', 'order' => 'ASC', 'hide_empty' => 0, ) );

foreach( $business_prima_categories_raw as $business_prima_categoryy ){
	
	$business_primaAvailableCats[$business_prima_categoryy->term_id] = $business_prima_categoryy->name;
	
}

$business_primaBusinessLayoutType = array( 
	'select' => __('Select', 'business-prima'),
	'one' => __('One', 'business-prima'),
	'two' => __('Two', 'business-prima'),
	'seven' => __('Seven', 'business-prima'),
	'woo-one' => __('Woocommerce One', 'business-prima'),
);
