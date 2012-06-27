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
	
	public function get_browsetags()
	{
		$alltags=Tag::order_by('tag', 'asc')->get();
		return View::make('pages.listtags')
			->with('tags', $alltags)
			->with('title', "All tags");
	}
}
	
	
