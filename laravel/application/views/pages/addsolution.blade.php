@layout('templates.main')

@section('content')

<div>


	<h1>
		{{$prob->title}}
	</h1>
	<div>
		{{$prob->fixmathjax}}
		
	</div>
	<div>
	Attachments:
				@foreach ($prob->attachments AS $attachment)
					
					<!-- <img src="{{$attachment->link}}" alt="" width="" height="" border="0" /><br /> -->
					<div>{{$attachment->imgsrc}}<div>{{$attachment->pivot->description}}</div></div> 	



				@endforeach
	</div>
	<div>
	{{Form::open_for_files("solutions/add/$prob->id", "POST", array("class" => "form-horizontal"))}}

<fieldset>
	<legend>Add a solution to this problem</legend>

	<div class="control-group">
		{{Form::label('content', "Solution Text", array("class" => "control-label"))}}
		<div class="controls">
			{{Form::textarea('content',Input::old('content'), array("class" => "input-xlarge"))}}
		</div>
	</div>


	<hr />


	<div class="control-group">
		{{Form::label('attachement', "Add attachments", array("class" => "control-label"))}}
		<div class="controls attachment-block">
			{{Form::file('attachment1')}}<br />
			Caption: {{Form::text('caption1',Input::old('caption1'))}}<br /><p>
			{{Form::file('attachment2')}}<br />
			Caption: {{Form::text('caption2',Input::old('caption2'))}}<br /><p>
			{{Form::file('attachment3')}}<br />
			Caption: {{Form::text('caption3',Input::old('caption3'))}}
		</div>
	</div>
	
	<div class="form-actions">
		{{Form::submit('Submit', array("class" => "btn btn-primary"))}}
	</div>
</fieldset>

{{Form::close()}}
</div>

@endsection
