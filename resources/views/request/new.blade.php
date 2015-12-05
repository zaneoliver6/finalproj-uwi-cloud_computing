@extends('app')

@section('title')
{{ $title }}
@endsection

@section('subtitle')
{{ $sub }}
@endsection

@section('content')
<hr>
<div class="col-md-4">
	<form class="form-horizontal" role="form" method="POST" action="/request/create" id="cForm">
    {!! csrf_field() !!}
		<div class="form-group">
			<label for="subject" class="col-sm-2 control-label">
			    Subject
			</label>
			<div class="col-sm-10">
				<input type="text" name="subject" class="form-control" />
			</div>
		</div>

    <div class="form-group">
      <label for="type" class="col-sm-2 control-label">
        Type
      </label>
      <div class="col-sm-10 selectContainer">
        <select name="type" class="form-control">
          <option value=""></option>
          <option value="complaint">Complaint</option>
          <option value="service">Service Request</option>
        </select>
      </div>
    </div>

		<div class="form-group">
			<label for="body" class="col-sm-2 control-label">
				Body
			</label>
			<div class="col-sm-10">
				<textarea name="body" rows="4" cols="50" class="form-control" form="cForm"></textarea>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-success">
					Send
				</button>
			</div>
		</div>

	</form>
</div>
<div class="col-md-4">
</div>

@endsection
