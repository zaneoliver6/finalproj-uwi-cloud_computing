@extends('app')

@section('title')
{{ $title }}
@endsection

@section('subtitle')
{{ $sub }}
@endsection


@section('content')

@if (Session::has('flash_notification.message'))
    <div class="alert alert-{{ Session::get('flash_notification.level') }}">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

        {{ Session::get('flash_notification.message') }}
    </div>
@endif

<div class="col-md-4">
</div>
<div class="col-md-4">

<form class="form-horizontal" role="form" method="POST" action="/profile/update">
{!! csrf_field() !!}
    <div class="form-group" style="padding-top:50">

      <label for="fname" class="col-sm-2 control-label">
        First Name
      </label>
      <div class="col-sm-10">
        <input type="text" name="fname" class="form-control" placeholder="First Name" id="fname" value="<?= isset($customer) ? $customer->fname : ''?>" />
      </div>
    </div>

    <div class="form-group">

      <label for="lname" class="col-sm-2 control-label">
        Last Name
      </label>
      <div class="col-sm-10">
        <input type="text" name="lname" class="form-control" placeholder="Last Name" id="lname" value="<?= isset($customer) ? $customer->lname : ''?>" />
      </div>
    </div>

    <div class="form-group">
      <label for="phone" class="col-sm-2 control-label">
        Phone Number:
      </label>
      <div class="col-sm-10">
        <input type="text" name="phone" class="form-control" placeholder="Phone Number" id="phone" data-toggle="tooltip" title="Enter number without dashes or spaces" value="<?= isset($customer) ? $customer->phonenumber : ''?>"/>
      </div>
    </div>

    <div class="form-group">

      <label for="email" class="col-sm-2 control-label">
        Email
      </label>
      <div class="col-sm-10">
        <input type="email" name="email" class="form-control" placeholder="Email Address" id="email" value="<?= isset($customer) ? $customer->email : ''?>" />
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label" for="address">Address</label>
      <div class="col-sm-10">
      <input id="address" name="address" type="text" placeholder="Street Address" class="form-control" value="<?= isset($customer) ? $customer->address->address : ''?>">
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label" for="city">City</label>
      <div class="col-sm-10">
      <input id="city" name="city" type="text" placeholder="City" class="form-control input" value="<?= isset($customer) ? $customer->address->city : ''?>">
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label" for="state">State</label>
      <div class="col-sm-10">
      <input id="state" name="state" type="text" placeholder="State" class="form-control input-md" value="<?= isset($customer) ? $customer->address->state : ''?>">

      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label" for="zip">Zip/Postal Code</label>
      <div class="col-sm-10">
      <input id="zip" name="zip" type="text" placeholder="Zip/Postal Code" class="form-control input-md" value="<?= isset($customer) ? $customer->address->zip : ''?>">
      </div>
    </div>

    <div class="form-group">
      <label for="password" class="col-sm-2 control-label">
        Password
      </label>
      <div class="col-sm-10">
        <input type="password" name="password" class="form-control" placeholder="Password" id="password"  data-toggle="tooltip" title="Leave Blank if not updating"/>
      </div>
    </div>

  <div class="form-group">

    <label for="password_confirmation" class="col-sm-2 control-label">
    Confirm	Password
    </label>
    <div class="col-sm-10">
      <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation" id="password_confirmation" data-toggle="tooltip" title="Leave Blank if not updating" ?/>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">

      <button type="submit" class="btn btn-success btn-block">
        Save
      </button>
    </div>
  </div>

  </form>
</div>
<div class="col-md-4">
  <div class="pull-right">
    <a href="/profile" class="btn btn-success">Back</a>
  </div>
</div>
@endsection
