@layout('templates.main')

@section('content')

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

@endsection
