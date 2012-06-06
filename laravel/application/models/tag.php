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
}
