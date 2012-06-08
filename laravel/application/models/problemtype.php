<?php

class Problemtype extends Eloquent
{

	// a user can have many problems

	// lets use the has_many relationship for this
	
	public function problems()
	{
		return $this->has_many('Problem');
	}
	
	
	
}
