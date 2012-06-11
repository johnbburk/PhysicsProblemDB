@layout('templates.main')

@section('content')

@foreach ($probs AS $prob)
<div>
<h1>
{{$prob->title}}
</h1>
<div>
{{$prob->question}}
</div>
Tags:
@foreach ($prob->tags AS $tag)
{{$tag->tag}}, 
@endforeach
<hr/>
@endforeach

@endsection
