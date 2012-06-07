<?php

class User extends Eloquent
{

	// a user can have many problems

	// lets use the has_many relationship for this
	public function problems()
	{
		return $this->has_many('Problem');
	}
	
	public function tags()
	{
		return $this->has_many('Tag');
	}
	
	public function solutions()
	{
		return $this->has_many('Solution');
	}
	
	public function attachments()
	{
		return $this->has_many('Attachment');
	}
	
	public function solutioncomments()
	{
		return $this->has_many('Solutioncomment');
	}
	
	public function comments()
	{
		return $this->has_many('Comment');
	}
}
