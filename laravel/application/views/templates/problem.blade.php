<div>
	<h1>
	{{$prob->link}}
	</h1>
	<div>uploaded by
	@if (isset($public))
		{{$prob->user->fullname}}
	@else
		@if ($prob->user->id == Auth::user()->id)
			you 
		@else
			{{$prob->user->fullname}}
		@endif
	@endif
	on {{$prob->created_at}}</div>
	<div>
	{{$prob->fixmathjax}}
	</div>
	<div class="answer">
	Answer: {{mathjaxmarkdown::mjmd($prob->answer)}}
	</div>
	@if (!isset($notags))
	Tags:
		@foreach ($prob->tags AS $tag)
		{{$tag->link}}, 
		@endforeach
	@endif
	<br>
	Attachments:
		@foreach ($prob->attachments AS $attachment)
			
			<!-- <img src="{{$attachment->link}}" alt="" width="" height="" border="0" /><br /> -->
			<div>{{$attachment->imgsrc}}<div>{{$attachment->pivot->description}}</div></div> 	



		@endforeach

		<p>{{$prob->addsollink}}</p>
		<p>{{$prob->showsollink}}</p>
		@if (!isset($public))
			@if (Auth::user()->is_active==2)
				<p>{{$prob->deletelink}}</p>
			@endif
		@endif
</div>	
