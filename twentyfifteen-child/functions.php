<?php

class MyCustomTheme
{
	public static function enqueueStyles()
	{
		// enqueue parent styles
		wp_enqueue_style('parent-theme', get_template_directory_uri() .'/style.css');
		// enqueue fonts
		wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css');
		wp_enqueue_style('font-pacifico', 'https://fonts.googleapis.com/css?family=Pacifico');
		wp_enqueue_style('font-lato', 'https://fonts.googleapis.com/css?family=Lato');
		// enqueue child styles
		wp_enqueue_style('child-theme', get_stylesheet_directory_uri() .'/style.css', array('parent-theme'));
		wp_dequeue_style('twentyfifteen-fonts');
	}

	public static function yearsElapsed($atts, $content = null)
	{
		$parameters = shortcode_atts(['date' => date('Y-m-d')], $atts);
		try {
			$diff = (new \DateTime('00:00:00'))->diff(new \DateTime($parameters['date'] . ' 00:00:00'));
			return $diff->format('%y');
		} catch(\Exception $e) {
			return "Invalid date. Use for example: [years_elapsed date=2017-07-12]";
		}
	}
}

add_action('wp_enqueue_scripts', 'MyCustomTheme::enqueueStyles');
add_shortcode('years_elapsed', 'MyCustomTheme::yearsElapsed');
