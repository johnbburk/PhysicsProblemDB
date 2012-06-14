<?php



class Admin_setupdb_Controller extends Base_Controller
{
	public function action_index()
	{
	//The following drop commands need to be run if
// the tables already exist.
// If your db is empty, just leave them commented out
	
Schema::drop('attachments');
Schema::drop('attachment_problem');
Schema::drop('attachment_solution');
Schema::drop('comments');
Schema::drop('problemformats');
Schema::drop('problemlevels');
Schema::drop('problemtypes');
Schema::drop('problems');
Schema::drop('problem_tag');
Schema::drop('solutioncomments');
Schema::drop('solutions');
Schema::drop('tags');
Schema::drop('users');

Schema::table('attachments', function($table)

{

$table->create();

$table->increments('id');

$table->integer('user_id');

$table->text('link');

$table->timestamps();

});

Schema::table('attachment_problem', function($table)

{

$table->create();

$table->increments('id');

$table->integer('problem_id');

$table->integer('attachment_id');

$table->integer('user_id');

$table->timestamps();

});

Schema::table('attachment_solution', function($table)

{

$table->create();

$table->increments('id');

$table->integer('solution_id');

$table->integer('attachment_id');

$table->timestamps();

});

Schema::table('comments', function($table)

{

$table->create();

$table->increments('id');

$table->integer('user_id');

$table->integer('problem_id');

$table->text('content');

$table->timestamps();

});

Schema::table('problems', function($table)

{

$table->create();

$table->increments('id');

$table->integer('user_id');

$table->string('title', 100);
$table->text('question');
$table->integer('problemtype_id');
$table->integer('problemlevel_id');
$table->integer('problemformat_id');
$table->string('citation', 45);

$table->timestamps();

});

Schema::table('problemlevels', function($table)
	{
		$table->create();
		$table->increments('id');
		$table->string('level', 50);
		$table->timestamps();
	}
	);

Schema::table('problemformats', function($table)
	{
		$table->create();
		$table->increments('id');
		$table->string('format', 50);
		$table->timestamps();
	}
	);

Schema::table('problemtypes', function($table)
	{
		$table->create();
		$table->increments('id');
		$table->string('type', 50);
		$table->timestamps();
	}
	);


Schema::table('problem_tag', function($table)

{

$table->create();

$table->increments('id');

$table->integer('problem_id');

$table->integer('tag_id');

$table->integer('user_id');

$table->timestamps();

});

Schema::table('solutioncomments', function($table)

{

$table->create();

$table->increments('id');

$table->integer('user_id');

$table->integer('solution_id');

$table->text('content');

$table->timestamps();

});

Schema::table('solutions', function($table)

{

$table->create();

$table->increments('id');

$table->integer('user_id');

$table->integer('problem_id');

$table->text('content');

$table->timestamps();

});

Schema::table('tags', function($table)

{

$table->create();

$table->increments('id');

$table->integer('user_id');

$table->string('tag', 50);

$table->integer('is_canonical');

$table->text('description');

$table->integer('is_standard');

$table->timestamps();

});

Schema::table('users', function($table)

{

$table->create();

$table->increments('id');

$table->string('username', 50);

$table->string('password', 64);

$table->string('firstname',45);

$table->string('lastname', 45);

$table->string('email', 50);

$table->string('institution', 100);

$table->string('address', 45);

$table->string('address2', 45);

$table->string('city', 45);

$table->string('state', 45);

$table->string('zip', 45);

$table->string('country', 45);

$table->integer('is_active');

$table->timestamps();

});	
	}
}
