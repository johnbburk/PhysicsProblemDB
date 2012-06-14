<?php

Schema::table(‘attachments’, function($table)

{

$table->create();

$table->increments(‘id’);

$table->integer(‘user_id’);

$table->text(‘content’);

$table->timestamps();

});

Schema::table(‘attachment_problem’, function($table)

{

$table->create();

$table->increments(‘id’);

$table->integer(‘problem_id’);

$table->integer(‘attachment_id’);

$table->timestamps();

});

Schema::table(‘attachment_solution’, function($table)

{

$table->create();

$table->increments(‘id’);

$table->integer(‘solution_id’);

$table->integer(‘attachment_id’);

$table->timestamps();

});

Schema::table(‘probcomments’, function($table)

{

$table->create();

$table->increments(‘id’);

$table->integer(‘user_id’);

$table->integer(‘problem_id’);

$table->text(‘content’);

$table->timestamps();

});

Schema::table(‘problems’, function($table)

{

$table->create();

$table->increments(‘id’);

$table->text(‘content’);

$table->integer(‘user_id’);

$table->timestamps();

});

Schema::table(‘problem_tag’, function($table)

{

$table->create();

$table->increments(‘id’);

$table->integer(‘problem_id’);

$table->integer(‘tag_id’);

$table->timestamps();

});

Schema::table(‘solcomments’, function($table)

{

$table->create();

$table->increments(‘id’);

$table->integer(‘user_id’);

$table->integer(‘solution_id’);

$table->text(‘content’);

$table->timestamps();

});

Schema::table(‘solutions’, function($table)

{

$table->create();

$table->increments(‘id’);

$table->integer(‘user_id’);

$table->integer(‘problem_id’);

$table->text(‘content’);

$table->timestamps();

});

Schema::table(‘tags’, function($table)

{

$table->create();

$table->increments(‘id’);

$table->integer(‘user_id’);

$table->string(‘tag’, 50);

$table->timestamps();

});

Schema::table(‘users’, function($table)

{

$table->create();

$table->increments(‘id’);

$table->string(‘name’, 50);

$table->string(‘password’, 64);

$table->string(‘school’, 100);

$table->timestamps();

});
