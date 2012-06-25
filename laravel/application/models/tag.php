<?php

class Tag extends Eloquent
{

	// a user can have many problems

	// lets use the has_many relationship for this
	public function problems()
	{
		return $this->has_many_and_belongs_to('Problem');
	}
	
	public function user()
	{
		return $this->belongs_to('User');
	}
	
	public function get_link()
	{
		$id=$this->get_attribute('id');
		$tag=$this->get_attribute('tag');
		//return HTML::link('tags/singletag/'.$id, $tag);
		return HTML::link_to_action('tags@singletag', $tag, array($id));
	}
}
