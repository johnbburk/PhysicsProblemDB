<?php

class Images_Controller extends Base_Controller
{
	public $restful=true;
	
	// I commented this out so that the equipment page
	// can show images even to those no logged in
	// -Andy
	/* public function __construct()
	{
		$this->filter('before', 'auth');
	} */
	
	public function get_showimage($link)
	{
		
		$ourpath=path('storage').'attachments/'.$link;
		return Response::download($ourpath);
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
	
	
