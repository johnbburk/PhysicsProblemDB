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
	
// this testing function is just trying to optimize
// the mysql query to get an ordered list of problems
// that have the tags listed (in this case, 2 and 3).
// The line with "having" in it ensures only problems
// with both tags (or more). The line with "order by"
// gives problems that have 1 or more of those tags
// ordered by relevance
	public function get_testing()
	{
		$sql="select distinct p.id ";
		$sql.="from problems p, problem_tag pt ";
		$sql.="where p.id=pt.problem_id";
		//$sql.=" and tag_id IN (2,3) group by p.id having count(p.id) = 2";
		$sql.=" and tag_id IN (2,3) group by p.id order by count(p.id) DESC";
		$q=DB::query($sql);
		foreach ($q AS $qsingle)
		{
			echo $qsingle->id;
			echo ", ";
		};
	}
	
	public function get_tags()
	{
		$tags=Tag::order_by('tag', 'asc')->get();
		return View::make('pages.searchtags')
			->with('tags', $tags);
	}
	
	public function post_tags()
	{
		$taglist=Input::get('searchtags');
		$num=count($taglist);
		$taginsert=implode(',', $taglist);
		$sql="select distinct p.id ";
		$sql.="from problems p, problem_tag pt ";
		$sql.="where p.id=pt.problem_id";
		//$sql.=" and tag_id IN (2,3) group by p.id having count(p.id) = 2";
		$sql.=" and tag_id IN ($taginsert) group by p.id order by count(p.id) DESC";
		$query=DB::query($sql);
		$probs=array();
		foreach ($query AS $q)
		{
			$probs[]=Problem::find($q->id);
		};
		return View::make('pages.myproblems')
			->with('probs', $probs);
	}
}
