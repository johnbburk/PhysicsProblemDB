@layout('templates.main')

@section('content')
@if (Session::get('submitworked')==true)
<div><span class='error'>Thanks for the submission. I've repopulated the form
with your submission, but don't worry, I've already saved this one.</span></div>
@endif
{{Form::open('problems/new')}}
<p>Title {{Form::text('title',Input::old('title'))}}</p>
<p>Main text</p>
<p>{{Form::textarea('content',Input::old('content'))}}</p>
<p>Please choose the appropriate format, type, and level for this problem</p>

<p>

{{Form::select('format',$formats, Input::old('format'))}}
{{Form::select('type',$types, Input::old('type'))}}
{{Form::select('level',$levels, Input::old('level'))}}
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
