<?php

/**
 * Font section
 */

// Font section.
$wp_customize->add_section(
	'fact_news_font_options',
	array(
		'title'    => esc_html__( 'Font ( Typography ) Options', 'fact-news' ),
		'panel'    => 'fact_news_theme_options_panel',
		'priority' => 20,
	)
);

// Typography - Site Title Font.
$wp_customize->add_setting(
	'fact_news_site_title_font',
	array(
		'default'           => '',
		'sanitize_callback' => 'fact_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'fact_news_site_title_font',
	array(
		'label'    => esc_html__( 'Site Title Font Family', 'fact-news' ),
		'section'  => 'fact_news_font_options',
		'settings' => 'fact_news_site_title_font',
		'type'     => 'select',
		'choices'  => fact_news_font_choices(),
	)
);

// Typography - Site Description Font.
$wp_customize->add_setting(
	'fact_news_site_description_font',
	array(
		'default'           => '',
		'sanitize_callback' => 'fact_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'fact_news_site_description_font',
	array(
		'label'    => esc_html__( 'Site Description Font Family', 'fact-news' ),
		'section'  => 'fact_news_font_options',
		'settings' => 'fact_news_site_description_font',
		'type'     => 'select',
		'choices'  => fact_news_font_choices(),
	)
);

// Typography - Header Font.
$wp_customize->add_setting(
	'fact_news_header_font',
	array(
		'default'           => '',
		'sanitize_callback' => 'fact_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'fact_news_header_font',
	array(
		'label'    => esc_html__( 'Header Font Family', 'fact-news' ),
		'section'  => 'fact_news_font_options',
		'settings' => 'fact_news_header_font',
		'type'     => 'select',
		'choices'  => fact_news_font_choices(),
	)
);

// Typography - Body Font.
$wp_customize->add_setting(
	'fact_news_body_font',
	array(
		'default'           => '',
		'sanitize_callback' => 'fact_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'fact_news_body_font',
	array(
		'label'    => esc_html__( 'Body Font Family', 'fact-news' ),
		'section'  => 'fact_news_font_options',
		'settings' => 'fact_news_body_font',
		'type'     => 'select',
		'choices'  => fact_news_font_choices(),
	)
);
