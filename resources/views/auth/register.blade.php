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
								<input type="text" name="fname" class="form-control" id="fname" placeholder="First Name" />
							</div>
						</div>

            <div class="form-group">

							<label for="lname" class="col-sm-2 control-label">
								Last Name
							</label>
							<div class="col-sm-10">
								<input type="text" name="lname" class="form-control" id="lname"  placeholder="Last Name"/>
							</div>
						</div>

            <div class="form-group">
              <label for="phone" class="col-sm-2 control-label">
                Phone Number:
              </label>
              <div class="col-sm-10">
                <input type="number" name="phone" class="form-control" id="phone" data-toggle="tooltip" title="Enter number without dashes or spaces" placeholder="Phone Number"/>
              </div>
            </div>

            <div class="form-group">

							<label for="companyName" class="col-sm-2 control-label">
								Company Name
							</label>
							<div class="col-sm-10">
								<input type="text" name="companyName" class="form-control" id="companyName" placeholder="Company Name"/>
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
								<input type="email" name="email" class="form-control" id="email" placeholder="Email Address"/>
							</div>
						</div>

            <div class="form-group">
              <label class="col-sm-2 control-label" for="address">Address</label>
              <div class="col-sm-10">
              <input id="address" name="address" type="text" placeholder="Street Address" class="form-control" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label" for="city">City</label>
              <div class="col-sm-10">
              <input id="city" name="city" type="text" placeholder="City" class="form-control input" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label" for="state">State</label>
              <div class="col-sm-10">
              <input id="state" name="state" type="text" placeholder="State" class="form-control input-md" />

              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label" for="zip">Zip/Postal Code</label>
              <div class="col-sm-10">
              <input id="zip" name="zip" type="text" placeholder="Zip/Postal Code" class="form-control input-md" />
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
                Scale user limit as needed.
                <hr>
                $25 per month
                <hr>
                <div class="form-group">
    							<div class="col-sm-offset-2 col-sm-10">
    								<div class="radio">

    									<label>
    										<input type="radio" name="subscriptionType" value="basic"/>
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
                Scale user limit as needed.
                <hr>
                $50 per month
                <hr>
                <div class="form-group">
    							<div class="col-sm-offset-2 col-sm-10">
    								<div class="radio">

    									<label>
    										<input type="radio" name="subscriptionType" value="standard"/>
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
                Scale user limit as needed.
                <hr>
                $75 per month
                <hr>
                <div class="form-group">
    							<div class="col-sm-offset-2 col-sm-10">
    								<div class="radio">

    									<label>
    										<input type="radio" name="subscriptionType" value="premium"/>
    									</label>
    								</div>
    							</div>
    						</div>
                <hr>
  						</div>
					  </div>

						<div class="form-group">
							<div class="col-sm-offset-1 col-sm-10">
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
