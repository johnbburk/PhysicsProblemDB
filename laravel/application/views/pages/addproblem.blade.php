@layout('templates.main')

@section('content')
@if (Session::get('submitworked')==true)
<div><span class='error'>Thanks for the submission. I've repopulated the form
		with your submission, but don't worry, I've already saved this one.</span></div>
@endif

{{Form::open_for_files('problems/new', "POST", array("class" => "form-horizontal"))}}

<fieldset>
	<legend>Add a new problem to the database!</legend>

	<div class="control-group">
		{{Form::label('title', "Problem Title", array("class" => "control-label"))}}
		<div class="controls">
			{{Form::text('title',Input::old('title'), array("class" => "input-xlarge"))}}
		</div>
	</div>


	<div class="control-group">
		{{Form::label('content', "Problem Text", array("class" => "control-label"))}}
		<div class="controls">
			{{Form::textarea('content',Input::old('content'), array("class" => "input-xlarge"))}}
		</div>
	</div>
	
	<div class="control-group">
		{{Form::label('answer', "Answer", array("class" => "control-label"))}}
		<div class="controls">
			{{Form::textarea('answer',Input::old('content'), array("class" => "input-xlarge"))}}
		</div>
	</div>
	

	<hr />
	<div class="control-group">
		<label class="control-label">Problem format</label>
		<div class="controls">
			{{Form::select('format',$formats, Input::old('format'))}}
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Problem type</label>
		<div class="controls">
			{{Form::select('type',$types, Input::old('type'))}}
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Problem level</label>
		<div class="controls">
			{{Form::select('level',$levels, Input::old('level'))}}
			<p class="help-block">Please choose the appropriate format, type, and level for this problem</p>
		</div>
	</div>

	<hr />



	<div class="control-group">
		{{Form::label('newtags', "Tags", array("class" => "control-label"))}}
		<div class="controls">
			{{Form::text('newtags', null, array("class" => "input-xlarge" ))}}
			<p class="help-block">Add tags in comma-separated list, or select from the options below:</p>
		</div>
	</div>

	<div class="control-group">
		<div class="controls">
			<select name="tags[]" multiple="multiple">
				@foreach ($currenttags AS $ctag)
				<option value="{{$ctag->id}}">{{$ctag->tag}}</option>
				@endforeach
			</select>
		</div>
	</div>


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



@endsection

