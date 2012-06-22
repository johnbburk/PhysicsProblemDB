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
		return $this->has_many_and_belongs_to('Attachment');
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
	
	
		
}
