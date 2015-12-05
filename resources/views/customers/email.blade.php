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
	<form class="form-horizontal" role="form" method="POST" action="/customer/send/<?= $customer->id?>" id="emailForm">
    {!! csrf_field() !!}
		<div class="form-group">
			<label for="email" class="col-sm-2 control-label">
			    Title
			</label>
			<div class="col-sm-10">
				<input type="text" name="title" class="form-control" />
			</div>
		</div>

		<div class="form-group">
			<label for="password" class="col-sm-2 control-label">
				Body
			</label>
			<div class="col-sm-10">
				<textarea name="body" rows="4" cols="50" class="form-control" form="emailForm"></textarea>
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
