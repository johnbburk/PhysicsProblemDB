<?php

class Solutions_Controller extends Base_Controller
{
	public $restful=true;
	
	public function __construct()
	{
		$this->filter('before', 'auth');
	}
	
	public function get_index()
	{
		echo "this is the index page of solutions";
	}
	
	public function upload_attachment2($fname, $text, $sol, $userid)
	{
		if (array_get(Input::file($fname), 'tmp_name'))
		{
			$type=File::extension(array_get(Input::File($fname),'name'));
			$file1=Attachment::create(array('user_id'=>$userid,'type'=>$type));
			$sol->attachments()->attach($file1->id,array('description'=>$text,'user_id'=>$userid)); 
			$name=md5("ppdb".$file1->id);
			$name="$name.$type";
			$attachment1=Input::upload($fname,path('storage').'attachments/',$name);
		}
	}
	
	public function get_add($prob_id)
	{
		$prob=Problem::find($prob_id);
		return View::make('pages.addsolution')
			->with('prob', $prob);
	}
	
	public function post_add($prob_id)
	{
		$input = Input::all();
		$rules = array(
			'content' => 'required',
			'attachment1' => 'image', 
			'attachment2' => 'image', 
			'attachment3' => 'image', 
		);	
		
		$validation = Validator::make($input, $rules);
		if ($validation->fails())
		{
			//this redirect needs to be fixed
			return Redirect::to('/')->with_input()->with_errors($validation);
		}
		else
		{	
			
			$content = Input::get('content');
			$userid=Auth::user()->id;
			$sol = new Solution(array(
				'content' => $content,
				'problem_id' => $prob_id));
			$user=User::find($userid);
			$sol=$user->solutions()->insert($sol);
						
			//handle attachments
			
			$this->upload_attachment2('attachment1', Input::get('caption1'), $sol, $userid);
			$this->upload_attachment2('attachment2', Input::get('caption2'), $sol, $userid);
			$this->upload_attachment2('attachment3', Input::get('caption3'), $sol, $userid);
			
	
			
			return Redirect::to("solutions/add/$prob_id")->with_input()->with('submitworked', true);

			};
	}
}
