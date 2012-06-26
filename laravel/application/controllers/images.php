<?php

class Images_Controller extends Base_Controller
{
	public $restful=true;
	
	public function __construct()
	{
		$this->filter('before', 'auth');
	}
	
	public function action_showimage($id)
	{
		$image=Attachment::find($id);
		//return Request::download($image->
	}
}
	
	
