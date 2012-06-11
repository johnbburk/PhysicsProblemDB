@layout('templates.main')

@section('content')
{{Form::open('problems/new')}}
<p>Title {{Form::text('title')}}</p>
<p>Main text</p>
<p>{{Form::textarea('content')}}</p>
<p>Please choose the appropriate format, type, and level for this problem</p>

<p>

{{Form::select('format',$formats)}}
{{Form::select('type',$types)}}
{{Form::select('level',$levels)}}
</p>

<p>
add tags (comma separated): {{Form::text('newtags')}}
</p>
@foreach ($currenttags AS $ctag)
{{$ctag->tag}}: {{Form::checkbox("tags[]",$ctag->id)}}
@endforeach
{{Form::submit('submit')}}
{{Form::close()}}
@endsection
