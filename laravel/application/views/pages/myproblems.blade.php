@layout('templates.main')

@section('content')
	
	@foreach ($probs AS $prob)
		<div>
			<h1>
			{{$prob->link}}
			</h1>
			<div>uploaded by
			@if ($prob->user->id == Auth::user()->id)
			you 
			@else
			{{$prob->user->fullname}}
			@endif
			on {{$prob->created_at}}</div>
			<div>
			{{$prob->fixmathjax}}
			{{mathjaxmarkdown::mjmd($prob->answer)}}
			</div>
			Tags:
				@foreach ($prob->tags AS $tag)
				{{$tag->link}}, 
				@endforeach
			<br>
			Attachments:
				@foreach ($prob->attachments AS $attachment)
					
					<!-- <img src="{{$attachment->link}}" alt="" width="" height="" border="0" /><br /> -->
					<div>{{$attachment->imgsrc}}<div>{{$attachment->pivot->description}}</div></div> 	



				@endforeach
				</div>	
		<hr/>
	@endforeach


@endsection
