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
			<br>
			Attachments:
				@foreach ($prob->attachments AS $attachment)
					adding attachment
					<img src="{{$attachment->link}}" alt="" width="" height="" border="0" /><br />

				@endforeach
					
		<hr/>
	@endforeach

@endsection
