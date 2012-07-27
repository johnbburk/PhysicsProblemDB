<!-- this should always be fed $sol -->
<div>
<p>
{{mathjaxmarkdown::mjmd($sol->content)}}
</p>

<p>
Uploaded by: 
@if ($sol->user->id == Auth::user()->id)
	you 
	@else
	{{$sol->user->fullname}}
	@endif
	on {{$sol->created_at}}.
</p>
	
	Attachments:
		@foreach ($sol->attachments AS $attachment)
			
			<div>{{$attachment->imgsrc}}<div>{{$attachment->pivot->description}}</div></div> 	

		@endforeach

		
</div>	
