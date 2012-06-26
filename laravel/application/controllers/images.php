<?php

class Images_Controller extends Base_Controller
{
	public $restful=true;
	
	public function __construct()
	{
		$this->filter('before', 'auth');
	}
	
	public function get_showimage($id)
	{
		$image=Attachment::find($id);
		return Response::download($image->link);
		//echo $image->link;
	}
	
	public function get_srcimage($id)
	{
		echo "<img src=".URL::to_action('images@showimage', array($id))." />";
	}
	
	public function get_test($id)
	{
		$image=Attachment::find($id);
		echo $image->imgsrc;
	}
}
	
	
