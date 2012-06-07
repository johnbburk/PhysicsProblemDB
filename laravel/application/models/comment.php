<?php

class Comment extends Eloquent
{

	// a user can have many problems

	// lets use the has_many relationship for this
	
	public function user()
	{
		return $this->belongs_to('User');
	}
	
	public function problem()
	{
		return $this->belongs_to('Problem');
	}
	
	
}
