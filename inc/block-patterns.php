<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * @link https://developer.wordpress.org/block-editor/developers/block-api/block-patterns/
 *
 * @package Ada
 */

/**
 * Create custom block patterns to complement the theme.
 */
function ada_register_block_patterns() {

	if ( class_exists( 'WP_Block_Patterns_Registry' ) ) {

		register_block_pattern_category(
			__( 'banners', 'ada' ),
			array(
				'label' => __( 'Banners', 'ada' )
			)
		);

		register_block_pattern_category(
			__( 'call-to-actions', 'ada' ),
			array(
				'label' => __( 'Call To Actions', 'ada' )
			)
		);

		register_block_pattern(
			'ada/banner',
			array(
				'title'       => __( 'Basic Banner', 'ada' ),
				'description' => __( 'A Basic Banner', 'ada' ),
				'content'     => "<!-- wp:cover {\"url\":\"https://s.w.org/images/core/5.5/don-quixote-06.jpg\",\"id\":19,\"overlayColor\":\"black\",\"minHeight\":400,\"contentPosition\":\"center center\",\"align\":\"full\",\"className\":\"banner\"} -->\n<div class=\"wp-block-cover alignfull has-black-background-color has-background-dim is-position-center-center banner\" style=\"background-image:url(https://s.w.org/images/core/5.5/don-quixote-06.jpg);min-height:400px\"><div class=\"wp-block-cover__inner-container\"><!-- wp:heading {\"level\":1} -->\n<h1>Page Title</h1>\n<!-- /wp:heading --></div></div>\n<!-- /wp:cover -->",
				'categories'  => array( 'banners' ),
			)
		);

		register_block_pattern(
			'ada/banner-description',
			array(
				'title'       => __( 'Banner with description', 'ada' ),
				'description' => __( 'A Banner with a description', 'ada' ),
				'content'     => "<!-- wp:cover {\"url\":\"https://s.w.org/images/core/5.5/don-quixote-06.jpg\",\"id\":19,\"overlayColor\":\"black\",\"contentPosition\":\"center center\",\"align\":\"full\",\"className\":\"banner-description\"} -->\n<div class=\"wp-block-cover alignfull has-black-background-color has-background-dim is-position-center-center banner-description\" style=\"background-image:url(https://s.w.org/images/core/5.5/don-quixote-06.jpg)\"><div class=\"wp-block-cover__inner-container\"><!-- wp:heading {\"level\":1} -->\n<h1>Page Title</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Vestibulum quis turpis non nulla commodo mattis a et justo. Suspendisse nulla sapien, scelerisque vel varius id, auctor vitae lacus. Nulla vehicula libero eu consequat mattis. Vestibulum posuere, ante eget commodo convallis, risus felis pellentesque lacus, at vehicula arcu nulla ac arcu. Nulla tincidunt nibh in massa euismod sodales. In pellentesque metus dolor, condimentum cursus elit posuere sit amet. Nullam nec facilisis metus.</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:cover -->",
				'categories'  => array( 'banners' ),
			)
		);

		register_block_pattern(
			'ada/banner-description-button',
			array(
				'title'       => __( 'Banner with description and button', 'ada' ),
				'description' => __( 'A Banner with a description and button', 'ada' ),
				'content'     => "<!-- wp:cover {\"url\":\"https://s.w.org/images/core/5.5/don-quixote-06.jpg\",\"id\":19,\"overlayColor\":\"black\",\"contentPosition\":\"center center\",\"align\":\"full\",\"className\":\"banner-description-button\"} -->\n<div class=\"wp-block-cover alignfull has-black-background-color has-background-dim is-position-center-center banner-description-button\" style=\"background-image:url(https://s.w.org/images/core/5.5/don-quixote-06.jpg)\"><div class=\"wp-block-cover__inner-container\"><!-- wp:heading {\"level\":1,\"style\":{\"typography\":{\"fontSize\":42}}} -->\n<h1 style=\"font-size:42px\">Page Title</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Vestibulum quis turpis non nulla commodo mattis a et justo. Suspendisse nulla sapien, scelerisque vel varius id, auctor vitae lacus. Nulla vehicula libero eu consequat mattis. Vestibulum posuere, ante eget commodo convallis, risus felis pellentesque lacus, at vehicula arcu nulla ac arcu. Nulla tincidunt nibh in massa euismod sodales. In pellentesque metus dolor, condimentum cursus elit posuere sit amet. Nullam nec facilisis metus.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"borderRadius\":0,\"textColor\":\"white\",\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-white-color has-text-color no-border-radius\">Read More</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div></div>\n<!-- /wp:cover -->",
				'categories'  => array( 'banners' ),
			)
		);

		register_block_pattern(
			'ada/call-to-action',
			array(
				'title'       => __( 'Basic Call To Action', 'ada' ),
				'description' => __( 'Basic Call To Action block with title, description and button', 'ada' ),
				'content'     => "<!-- wp:group {\"align\":\"full\",\"className\":\"call-to-action\",\"backgroundColor\":\"vivid-red\",\"textColor\":\"white\"} -->\n<div class=\"wp-block-group alignfull call-to-action has-white-color has-vivid-red-background-color has-text-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"left\",\"style\":{\"typography\":{\"fontSize\":32}}} -->\n<h2 class=\"has-text-align-left\" style=\"font-size:32px\">Call To Action</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"left\"} -->\n<p class=\"has-text-align-left\">Vivamus ullamcorper neque et metus ultricies, at convallis ex convallis. Pellentesque sem sapien, suscipit sed euismod vel, interdum ultricies nulla. Fusce maximus est ut neque euismod semper. Nulla massa urna, aliquam sed mi ac, pellentesque efficitur purus.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"borderRadius\":0,\"textColor\":\"white\",\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-white-color has-text-color no-border-radius\">Read More</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div></div>\n<!-- /wp:group -->",
				'categories'  => array( 'call-to-actions' ),
			)
		);

		register_block_pattern(
			'ada/cover-call-to-action',
			array(
				'title'       => __( 'Cover Call To Action', 'ada' ),
				'description' => __( 'Cover Call To Action block with title, description and button', 'ada' ),
				'content'     => "<!-- wp:cover {\"url\":\"https://s.w.org/images/core/5.5/don-quixote-06.jpg\",\"id\":19,\"hasParallax\":true,\"align\":\"full\",\"className\":\"cover-call-to-action\"} -->\n<div class=\"wp-block-cover alignfull has-background-dim has-parallax cover-call-to-action\" style=\"background-image:url(https://s.w.org/images/core/5.5/don-quixote-06.jpg)\"><div class=\"wp-block-cover__inner-container\"><!-- wp:heading {\"style\":{\"typography\":{\"fontSize\":32}}} -->\n<h2 style=\"font-size:32px\">Call To Action</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Vivamus ullamcorper neque et metus ultricies, at convallis ex convallis. Pellentesque sem sapien, suscipit sed euismod vel, interdum ultricies nulla. Fusce maximus est ut neque euismod semper. Nulla massa urna, aliquam sed mi ac, pellentesque efficitur purus.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"borderRadius\":0,\"textColor\":\"white\",\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-white-color has-text-color no-border-radius\">Read More</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div></div>\n<!-- /wp:cover -->",
				'categories'  => array( 'call-to-actions' ),
			)
		);
	}

}
add_action( 'init', 'ada_register_block_patterns' );