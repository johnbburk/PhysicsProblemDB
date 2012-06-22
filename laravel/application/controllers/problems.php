<?php

class Problems_Controller extends Base_Controller
{
	public $restful=true;
	
	public function __construct()
	{
		$this->filter('before', 'auth');
	}
	
	public function get_index()
	{
		echo "this is the index page of problems";
	}
	
	public function prepareselector($models, $name)
	{
		$items=array();
		foreach ($models AS $model)
		{
			$items[$model->id] = $model->$name;
		};
		return $items;
	}
	
	public function get_new()
	{
		// get the formats, types, and levels to populate selectors
		
		
		$formatstopass2=$this->prepareselector(Problemformat::get(),'format');
		$typestopass2=$this->prepareselector(Problemtype::get(),'type');
		$levelstopass2=$this->prepareselector(Problemlevel::get(),'level');
		
		$currenttags = Tag::get();
		
		
		//$levels=Problemlevel::get(array('level'));
		return View::make('pages.addproblem')
			->with('formats', $formatstopass2)
			->with('levels', $levelstopass2)
			->with('types', $typestopass2)
			->with('currenttags', $currenttags);
	}
	
	public function post_new()
	{
		$title = Input::get('title');
		$content = Input::get('content');
		$level = Input::get('level');
		$type = Input::get('type');
		$format = Input::get('format');
		$newtags = Input::get('newtags');
		$userid=Auth::user()->id;
		$prob = new Problem(array(
			'title' => $title,
			'question' => $content,
			'problemtype_id' => $type,
			'problemformat_id' => $format,
			'problemlevel_id' => $level));
		$user=User::find($userid);
		$prob=$user->problems()->insert($prob);
		
/* 		$prob->problemformat()->insert(array('format'=>$format));
		$prob->problemtype()->insert(array('type'=>$type));
		$prob->problemlevel()->insert(array('level'=>$level)); */
		$newtagarray=explode(',',$newtags);
		foreach($newtagarray AS $newtag)
		{
			if ($newtag != '')
			{
				$tagmodel=$prob->tags()->insert(array('tag' => $newtag, 'user_id' => $userid), array('user_id'=>$userid));
			};
		};
		
		$oldtags = Input::get('tags', 'none');
		if ($oldtags != 'none')
		{
			foreach($oldtags AS $oldtag)
			{
				$prob->tags()->attach($oldtag, array('user_id'=>$userid));
			};
		};
		return Redirect::to('problems/new')->with_input()->with('submitworked', true);
	}
	
	public function get_mine()
	{
		$myprobs=Auth::user()->problems;
		return View::make('pages.myproblems')
			->with('probs', $myprobs);
	}
	
	
	// Here I want to make view problem set where tags can be added
	
	public function get_view($probid)
	{
		$prob=Problem::find($probid);
		$usedtags=$prob->tags()->lists('id');
		$remainingtags=Tag::where_not_in('id',$usedtags)->get();
		return View::make('pages.singleproblem')
			->with('prob', $prob)
			->with('unusedtags', $remainingtags);
	}
	
	public function post_view()
	{
		$userid=Auth::user()->id;
		$probid=Input::get('probid');
		$prob=Problem::Find($probid);
		$newtags = Input::get('newtags', 'none');
		if ($newtags != 'none')
		{
			foreach($newtags AS $newtag)
			{
				$prob->tags()->attach($newtag, array('user_id'=>$userid));
			};
		};
		$newtaglist=Input::get('newtaglist');
		$newtagarray=explode(',',$newtaglist);
		foreach($newtagarray AS $newtag)
		{
			if ($newtag != '')
			{
				$tagmodel=$prob->tags()->insert(array('tag' => $newtag, 'user_id' => $userid), array('user_id'=>$userid));
			};
		};
		return Redirect::to('problems/view/'.$probid);
	}
}
	
	
