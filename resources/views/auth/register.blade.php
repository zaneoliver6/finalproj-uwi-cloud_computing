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
					<form class="form-horizontal" role="form" method="POST" action="/auth/register">
            {!! csrf_field() !!}
            <div class="form-group">

							<label for="fname" class="col-sm-2 control-label">
								First Name
							</label>
							<div class="col-sm-10">
								<input type="text" name="fname" class="form-control" id="fname" value="{{ old('fname') }}" />
							</div>
						</div>

            <div class="form-group">

							<label for="lname" class="col-sm-2 control-label">
								Last Name
							</label>
							<div class="col-sm-10">
								<input type="text" name="lname" class="form-control" id="lname" value="{{ old('lname') }}" />
							</div>
						</div>

            <div class="form-group">
              <label for="phone" class="col-sm-2 control-label">
                Phone Number:
              </label>
              <div class="col-sm-10">
                <input type="number" name="phone" class="form-control" id="phone" data-toggle="tooltip" title="Enter number without dashes or spaces"/>
              </div>
            </div>

            <div class="form-group">

							<label for="companyName" class="col-sm-2 control-label">
								Company Name
							</label>
							<div class="col-sm-10">
								<input type="text" name="companyName" class="form-control" id="companyName" value="{{ old('companyName') }}" />
							</div>
						</div>

            <div class="form-group">
              <label for="utiltype" class="col-sm-2 control-label">
                Utility Type
              </label>
              <div class="col-sm-10 selectContainer">
                <select name="utiltype" class="form-control">
                  <option value=""></option>
                  <option value="water">Water</option>
                  <option value="electric">Electricity</option>
                  <option value="telecom">Telecommunications</option>
                </select>
              </div>
            </div>

						<div class="form-group">

							<label for="email" class="col-sm-2 control-label">
								Email
							</label>
							<div class="col-sm-10">
								<input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" />
							</div>
						</div>
						<div class="form-group">

							<label for="password" class="col-sm-2 control-label">
								Password
							</label>
							<div class="col-sm-10">
								<input type="password" name="password" class="form-control" id="password" />
							</div>
						</div>

            <div class="form-group">

							<label for="password_confirmation" class="col-sm-2 control-label">
							Confirm	Password
							</label>
							<div class="col-sm-10">
								<input type="password" name="password_confirmation" class="form-control" id="password_confirmation" />
							</div>
						</div>

            <div class="row">
  						<div class="col-md-4">
                <h3 class="text-center">Basic</h3>
                <hr>
                 Manage 250,000 Users
                <hr>
                Additional Buy: Auto-scaling
                <hr>
                $25 per month
                <hr>
                <div class="form-group">
    							<div class="col-sm-offset-2 col-sm-10">
    								<div class="radio">

    									<label>
    										<input type="radio" name="optradio" value="basic"/>
    									</label>
    								</div>
    							</div>
    						</div>
                <hr>
  						</div>
  						<div class="col-md-4">
                <h3 class="text-center">Standard</h3>
                <hr>
                 Manage 500,000 Users
                <hr>
                Additional Buy: Auto-scaling
                <hr>
                $50 per month
                <hr>
                <div class="form-group">
    							<div class="col-sm-offset-2 col-sm-10">
    								<div class="radio">

    									<label>
    										<input type="radio" name="optradio" value="standard"/>
    									</label>
    								</div>
    							</div>
    						</div>
                <hr>
  						</div>
  						<div class="col-md-4">
                <h3 class="text-center">Premium</h3>
                <hr>
                 Manage 1.25 Million Users
                <hr>
                Includes: Active Auto-Scaling
                <hr>
                $75 per month
                <hr>
                <div class="form-group">
    							<div class="col-sm-offset-2 col-sm-10">
    								<div class="radio">

    									<label>
    										<input type="radio" name="optradio" value="premium"/>
    									</label>
    								</div>
    							</div>
    						</div>
                <hr>
  						</div>
					  </div>

						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">

								<button type="submit" class="btn btn-success btn-block">
									Register
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
