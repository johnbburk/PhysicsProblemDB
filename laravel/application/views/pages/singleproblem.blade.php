@layout('templates.main')

@section('content')

<div>

{{Form::open('problems/view')}}
{{Form::hidden('probid', $prob->id)}}
<h1>
{{$prob->title}}
</h1>
<div>
{{$prob->question}}
</div>
<p>
Tags:
@foreach ($prob->tags AS $tag)
{{$tag->tag}}, 
@endforeach
</p>
<p>
Unused tags: 
@foreach ($unusedtags AS $unusedtag) 
{{Form::checkbox('newtags[]',$unusedtag->id)}}{{$unusedtag->tag}}, 
@endforeach
</p>
<p>
New tags (separate with commas) {{Form::text('newtaglist')}}
</p>
{{Form::submit('submit')}}
{{Form::close()}}

@endsection
