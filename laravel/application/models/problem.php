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
	
	public function comments()
	{
		return $this->has_many('comment');
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
	
	public function get_addsollink()
	{
		$id=$this->get_attribute('id');
		//return HTML::link('problems/view/'.$id, $title);
		// the line above works, but I think the below is what
		// Laravel likes better.
		return HTML::link_to_action('solutions@add', 'add solution', array($id));
	}
	
	public function get_showsollink()
	{
		$id=$this->get_attribute('id');
		return HTML::link_to_action('solutions@show', 'show solutions', array($id));
	}
	
	
	public function get_fixmathjax()
	{
		$text=$this->get_attribute('question');
		return mathjaxmarkdown::mjmd($text);
		
	}
	
	public function get_deletelink()
	{
		$id=$this->get_attribute('id');
		return HTML::link_to_action('problems@delete', 'delete this problem', array($id));
	}
	
		


}
