@layout('templates.main')

@section('content')

<h1>What is this?</h1>
<p>
On this page are pictures and descriptions of pieces of
equipment that people are struggling to identify. If
you can help out, please do! If you have questions, use the
commenting feature (by clicking on the problem 
title and using the comment box on that page). 
If you know what it is, please use the 
solution feature. Thanks!
</p>
<p>
You can add your own by using our {{HTML::link_to_action('equipment.add', 'add page', array($tagid))}}. Note that
the "what is this?" tag is already set for you on that page.
</p>

	@foreach ($probs->results AS $prob)
		@include('templates.problem')
		<hr/>
	@endforeach
	<p>{{$probs->links()}}</p>

@endsection
