@layout('templates.main')

@section('content')

<div>

	{{Form::open('problems/view')}}
	{{Form::hidden('probid', $prob->id)}}
	@include('templates.problem')->with('notags', True)
	<p>
	Your tags (these are the tags you have previously tagged for this problem, if
	you want to untag this problem for that tag, check the box):
	@foreach ($mytags AS $tag)
	{{Form::checkbox('untags[]', $tag->id)}}{{$tag->link}}, 
	@endforeach
	</p>
	<p>
	Others' tags (these are tags that others have associated with this problem - 
	note that you can't untag them for this problem):
	@foreach ($othertags AS $tag)
	{{$tag->link}}, 
	@endforeach
	</p>

	<p>
	Unused tags: 
	@foreach ($unusedtags AS $unusedtag) 
	{{Form::checkbox('newtags[]',$unusedtag->id)}}{{$unusedtag->link}}, 
	@endforeach
	</p>
	<p>
	New tags (separate with commas) {{Form::text('newtaglist')}}
	</p>
	<p>{{$prob->addsollink}}</p>
	{{Form::submit('submit')}}
	{{Form::close()}}
</div>

@endsection
