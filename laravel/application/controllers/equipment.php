<?php

class Equipment_Controller extends Base_Controller
{
	public $restful=true;
	
	/* public function __construct()
	{
		$this->filter('before', 'auth');
	} */
	
	public function get_index()
	{
		// first find the tag number for "what is it?"
		$tag=Tag::where_tag("what is this?")->first();
		
		$probs=$tag->problems()->order_by('created_at', 'desc')->paginate();
		
		return View::make('pages.whatisthis')
			->with('probs', $probs)
			->with('tagid', $tag->id)
			->with('public', 1);
	}
	
	public function get_add($tagid)
	{
		return Redirect::to_action('problems@new')
			->with('whatisthis', $tagid);
	}
}
	
	
	
	
