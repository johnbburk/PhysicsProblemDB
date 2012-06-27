@layout('templates.main')

@section('content')

<h1>{{$title}}</h1>
	
	@foreach ($tags AS $tag)
	{{$tag->link}},
	@endforeach

@endsection
