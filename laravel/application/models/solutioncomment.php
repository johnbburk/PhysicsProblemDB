<?php

class Solutioncomment extends Eloquent
{

	// a user can have many problems

	// lets use the has_many relationship for this
	
	public function user()
	{
		return $this->belongs_to('User');
	}
	
	public function solution()
	{
		return $this->belongs_to('Solution');
	}
	
	
}
