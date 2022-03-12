<?php 


function lunchersoon_setup_theme(){
	load_theme_textdomain("lunchersoon");
	add_theme_support("title-tag");
	add_theme_support('post-thumbnails');
}
add_action("after_setup_theme","lunchersoon_setup_theme");



function lunchersoon_linking_sty(){	

	if(is_page()){

		$lanchersoon_script = basename(get_page_template());

		if($lanchersoon_script == "lunchersoontemp.php"){
			wp_enqueue_style("stylesheet",get_theme_file_uri("/assets/css/animate.css"));
			wp_enqueue_style("icomoon",get_theme_file_uri("/assets/css/icomoon.css"));
			wp_enqueue_style("bootstrap",get_theme_file_uri("/assets/css/bootstrap.css"));
			wp_enqueue_style("stylt",get_theme_file_uri("/assets/css/style.css"));
			wp_enqueue_style("lunchersoon",get_stylesheet_uri(),null,"0.1");


			wp_enqueue_script("jqdf",get_theme_file_uri("/assets/js/jquery.min.js"),array("jquery"),null,true);
			wp_enqueue_script("easing",get_theme_file_uri("/assets/js/jquery.easing.1.3.js"),array("jquery"),null,true);
			wp_enqueue_script("bootstrap-js",get_theme_file_uri("/assets/js/bootstrap.min.js"),array("jquery"),null,true);
			wp_enqueue_script("waypoints",get_theme_file_uri("/assets/js/jquery.waypoints.min.js"),array("jquery"),null,true);
			wp_enqueue_script("simplyCountdown",get_theme_file_uri("/assets/js/simplyCountdown.js"),array("jquery"),null,true);
			wp_enqueue_script("main",get_theme_file_uri("/assets/js/main.js"),array("jquery"),null,true);


			$lunchersoon_year = get_post_meta(get_the_ID(),"day",true);
			$lunchersoon_hours = get_post_meta(get_the_ID(),"hours",true);
			$lunchersoon_minuts = get_post_meta(get_the_ID(),"minuts",true);
			$lunchersoon_secound = get_post_meta(get_the_ID(),"secound",true);

			wp_localize_script("main","lunchersondt",array(
				"day" => $lunchersoon_year,
				"hours" => $lunchersoon_hours,
				"minuts" => $lunchersoon_minuts,
				"secound" => $lunchersoon_secound,
			));
		}else{
			wp_enqueue_style("bootstrap",get_theme_file_uri("/assets/css/bootstrap.css"));
			wp_enqueue_style("lunchersoon",get_stylesheet_uri(),null,"0.1");
		}
	}


	
	
}
add_action("wp_enqueue_scripts","lunchersoon_linking_sty");


function luncher_sidebar(){
	register_sidebar(
		array(
			'name' => 'Left Sidebar',
			'id' => 'left-sidebar',
			'description' => 'Left sidebar show'
		)
	);


	register_sidebar(
		array(
			'name' => 'Right Sidebar',
			'id' => 'right-sidebar',
			'description' => 'Right sidebar show'
		)
	);
}
add_action("widgets_init","luncher_sidebar");


function lunchersoon_head_image(){
	if(is_page()){
	$header_url = get_the_post_thumbnail_url(null,"large");
	?>

	<style>
		.header-image{
			background-image: url(<?php echo $header_url; ?>);
		}
	</style>

	<?php 
	}
}
add_action("wp_head","lunchersoon_head_image");
















 ?>