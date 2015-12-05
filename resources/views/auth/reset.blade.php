@extends('blank')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
      <div class="row">
				<div class="col-md-4">
				</div>
        <div class="col-md-4">
          <p class="logo">
            <span class="logo-lg"><h1 class="text-center"><b>Utility</b>CRM</h1></span>
          </p>
				</div>
        <div class="col-md-4">
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-4">
					<form class="form-horizontal" role="form" method="POST" action="/password/reset">
            {!! csrf_field() !!}
            <input type="hidden" name="token" value="{{ $token }}">
              @if (count($errors) > 0)
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              @endif
						<div class="form-group">

							<label for="email" class="col-sm-2 control-label">
								Email
							</label>
							<div class="col-sm-10">
								<input type="email" name="email" class="form-control"/>
							</div>
						</div>
            <div class="form-group">
            <label for="password" class="col-sm-2 control-label">
                Password
              </label>
              <div class="col-sm-10">
                <input type="password" name="password" class="form-control" />
              </div>
            </div>
            <div class="form-group">
          <label for="password_confirmation" class="col-sm-2 control-label">
              Password Confirmation
            </label>
            <div class="col-sm-10">
              <input type="password" name="password_confirmation" class="form-control" />
            </div>
          </div>

						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">

								<button type="submit" class="btn btn-success btn-block">
									Reset Password
								</button>
							</div>
						</div>


					</form>
				</div>
				<div class="col-md-4">
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
