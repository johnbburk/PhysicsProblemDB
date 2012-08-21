<?php

class Equipment_Controller extends Base_Controller
{
	public $restful=true;
	
	
	
	public function get_index()
	{
		// first find the tag number for "what is it?"
		$tag=Tag::where_tag("what is this?")->first();
		
		$probs=$tag->problems()->paginate();
		
		return View::make('pages.whatisthis')
			->with('probs', $probs)
			->with('tagid', $tag->id);
	}
	
	public function get_add($tagid)
	{
		return Redirect::to_action('problems@new')
			->with('whatisthis', $tagid);
	}
}
	
	
	
	
