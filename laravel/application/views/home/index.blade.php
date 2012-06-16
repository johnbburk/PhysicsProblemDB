@layout('templates.main')

@section('content')
<p>{{HTML::link_to_action('admin.account@login', 'Login')}}</p>
<p>{{HTML::link_to_action('admin.setupdb@dropdb', 'Set up database')}} <span class='error'>
only do this if you want to clear out your current copy of the database!</span></p>
<p>{{HTML::link_to_action('admin.account@newuser', 'Sign up for an account')}}</p>
<p>{{HTML::link_to_action('problems@new', 'Add a problem to the database')}}</p>
<p>{{HTML::link_to_action('problems@mine', 'see your problems')}}</p>


@endsection
