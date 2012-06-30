<?php

class Problem extends Eloquent
{

	// our post object will belong to an author
	//
	// lets create a belongs_to relationship on the
	// author_id field
	public function user()
	{
		return $this->belongs_to('User', 'user_id');
	}
	
	public function tags()
	{
		return $this->has_many_and_belongs_to('Tag')->with(array('user_id'));
	}
	
	public function solutions()
	{
		return $this->has_many('Solution');
	}
	
	public function attachments()
	{
		return $this->has_many_and_belongs_to('Attachment')->with(array('user_id', 'description'));
	}
	
	public function probcomments()
	{
		return $this->has_many('Probcomment');
	}
	
	public function problemformat()
	{
		return $this->belongs_to('Problemformat');
	}
	
	public function problemtype()
	{
		return $this->belongs_to('Problemtype');
	}
	
	public function problemlevel()
	{
		return $this->belongs_to('Problemlevel');
	}
	
	public function get_link()
	{
		$id=$this->get_attribute('id');
		$title=$this->get_attribute('title');
		//return HTML::link('problems/view/'.$id, $title);
		// the line above works, but I think the below is what
		// Laravel likes better.
		return HTML::link_to_action('problems@view', $title, array($id));
	}
	
	public function get_fixmathjax()
	{
		$text=$this->get_attribute('question');
		$tmp=preg_split('/(\\\\[\(\[].*?\\\\[\)\]])/', $text, -1, PREG_SPLIT_DELIM_CAPTURE);
		$replacestring="MaThJaX EqUaTiOn";
		//print_r($tmp);
		//return $tmp[1];
		$number=floor(count($tmp)/2);
		//echo "$s has $number equations in it";
		$corrected='';
		$eqns=array();
		$urleqns=array();
		for ($i=0; $i<$number; $i++) {
			$corrected.=$tmp[$i*2];
	//		$nobr=str_replace("<br />", "", $tmp[$i*2+1]);
			$alt=$tmp[$i*2+1];
			$eqns[]=$alt;
			$coreqn=urlencode($alt);
			$urleqns[]=$coreqn;
			$corrected.=$replacestring;
	//		$corrected.="<img src='http://euclid.hamline.edu/~arundquist/latex/readfilechecklogdb.php?mag=1&eqn=$coreqn' style='vertical-align:middle;' alt='$alt'/>";
			};
		$corrected.=$tmp[2*$number]; 
		//return $corrected." num=$number"; 
		$intermediate=Sparkdown\Markdown($corrected);
		$tmp=preg_split('/('.$replacestring.')/', $intermediate, -1, PREG_SPLIT_DELIM_CAPTURE);

		//print_r($tmp);
		//return $tmp[1];
		$number=floor(count($tmp)/2);
		//echo "$s has $number equations in it";
		$corrected='';
		for ($i=0; $i<$number; $i++) {
			$corrected.=$tmp[$i*2];
	//		
			$corrected.=$eqns[$i];
	//		$corrected.="<img src='http://euclid.hamline.edu/~arundquist/latex/readfilechecklogdb.php?mag=1&eqn=$coreqn' style='vertical-align:middle;' alt='$alt'/>";
			};
		$corrected.=$tmp[2*$number];
		return $corrected;
	}
		
}
