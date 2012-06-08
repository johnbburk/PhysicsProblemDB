@layout('templates.main')

@section('content')
{{Form::select('format',$formats)}}
{{Form::select('type',$types)}}
{{Form::select('level',$levels)}}

@endsection
