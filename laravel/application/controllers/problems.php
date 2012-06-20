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
		$attachment1=Input::upload('attachment1','/attachments'.'1');
		$attachment2=Input::get('attachment2');
		$attachment3=Input::get('attachment3');
		$caption1=Input::get('caption1');
		$caption2=Input::get('caption2');
		$caption3=Input::get('caption3');
		
		
		
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
				$prob->tags()->insert(array('tag' => $newtag, 'user_id' => $userid));
			};
		};
		
		$oldtags = Input::get('tags', 'none');
		if ($oldtags != 'none')
		{
			foreach($oldtags AS $oldtag)
			{
				$prob->tags()->attach($oldtag);
			};
		};
		
		//handle attachments
		echo "attachment1:";
		echo $attachment1;
		$file1=new Attachment(array('user_id'=>$userid,'link'=>'attachment1'));
		$file1->save();
		//need to add link to problem_attachments with caption
		
		
		return Redirect::to('problems/new')->with_input()->with('submitworked', true);
	}
	
	public function get_mine()
	{
		$myprobs=Auth::user()->problems;
		return View::make('pages.myproblems')
			->with('probs', $myprobs);
	}
	
	
	// Here I want to make view problem set where tags can be added
}
	
	
