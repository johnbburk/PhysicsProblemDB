@layout('templates.main')

@section('content')

<h1>{{$tag->tag}}</h1>
<p>Author: {{$tag->user->fullname}}</p>

@foreach ($tag->problems AS $prob)

<h2>{{$prob->link}}</h2>
<div>
{{$prob->question}}
<p>
@foreach ($prob->tags AS $tag)
{{$tag->link}}, 
@endforeach
</div>
<hr />
@endforeach

@endsection
