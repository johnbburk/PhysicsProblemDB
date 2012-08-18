@layout('templates.main')

@section('content')


<h1>Search for problems with tags</h1>
<div>
{{ Form::open() }}
<p>Choose your tags:</p>
@foreach ($tags AS $tag)
	{{Form::checkbox('searchtags[]', $tag->id)}}{{$tag->link}}, 
@endforeach
<br/>
{{ Form::submit('Search', array("class" => "btn btn-primary")) }}
{{ Form::close() }}
</div>
@endsection
