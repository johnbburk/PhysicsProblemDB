<?php

class Tags_Controller extends Base_Controller
{
	public $restful=true;
	
	public function __construct()
	{
		$this->filter('before', 'auth');
	}
	
	public function get_singletag($tag_id)
	{
		$tag=Tag::Find($tag_id);
		return View::make('pages.singletag')
			->with('tag', $tag);
	}
}
	
	
