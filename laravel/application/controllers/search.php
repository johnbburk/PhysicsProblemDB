<?php

class Search_Controller extends Base_Controller
{
	public $restful=true;
	
	public function __construct()
	{
		$this->filter('before', 'auth');
	}
	
	public function get_index()
	{
		echo "this is the index page of search";
	}
	
	public function get_testing()
	{
		$sql="select distinct p.id ";
		$sql.="from problems p, problem_tag pt ";
		$sql.="where p.id=pt.problem_id";
		$sql.=" and tag_id IN (2,3) group by p.id having count(p.id) = 2";
		$q=DB::query($sql);
		foreach ($q AS $qsingle)
		{
			echo $qsingle->id;
			echo ", ";
		};
	}
	
}
	
	
