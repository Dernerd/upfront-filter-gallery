<?php

class UpFrontFilterGalleryOptions extends UpFrontBlockOptionsAPI {

	public $tabs = array(
		'general' => 'General'
	);
	
	public $sets = array(
		
	);

	public $inputs = array(
		'general' => array(
			'gallery' => array(
				'type' => 'select',
				'name' => 'Gallery',
				'label' => 'Select Slider',
				'options' => 'get_galleries()',
				'tooltip' => '',
			),
		)
	);
	
	function get_galleries() {

		$args = array('post_type' => 'upfront_filter_gallery', 'posts_per_page' => -1);
		$items = array(
			'-1' => 'Select a gallery'
		);
		
		if( $data = get_posts($args)){
			
			foreach($data as $key){
				
				if( empty($key->post_title) ){
					$items[$key->ID] = 'Gallery ID ' . $key->ID;
				}else{
					$items[$key->ID] = $key->post_title;
				}
			}

		}
		
		return $items;
	}
}