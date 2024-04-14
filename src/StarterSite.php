<?php

use Timber\Site;


class StarterSite extends Site
{
	public function __construct()
	{
		add_action('acf/init', array($this, 'register_acf_block'));
		add_filter('timber/twig', array($this, 'add_to_twig'));
		add_action('wp_enqueue_scripts', array($this, 'register_scripts'));
		parent::__construct();
	}
	public function register_scripts()
	{
		wp_enqueue_style('style', get_template_directory_uri() . '/assets/dist/css/app.css', array());
		wp_enqueue_script('script', get_template_directory_uri() . '/assets/dist/js/app.js', array(), true, '1.0.0', true);
	}

	public function register_acf_block()
	{
		acf_register_block_type(array(
			'name'              => 'get_images',
			'title'             => __('Get Images Api'),
			'description'       => __('Getting images from the site Unsplash'),
			'render_template'   => 'template-parts/blocks/get_images/get_images.php',
			'mode'          => 'auto',
			'icon' => 'book-alt',
			'category'          => 'formatting',
		));
	}

	public function add_to_twig($twig)
	{
		$twig->addFilter(new Twig\TwigFilter('myfoo', [$this, 'myfoo']));
		return $twig;
	}
}
