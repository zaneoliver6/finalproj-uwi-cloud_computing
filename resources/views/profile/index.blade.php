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

<div class="col-md-3">
</div>
<div class="col-md-6">
  <div class="box box-success">
    <div class="box-body box-profile">
      <img class="profile-user-img img-responsive img-circle" src="" alt="<?= $user->full_name?> profile picture">
      <h3 class="profile-username text-center"><?= $user->full_name?></h3>

      <ul class="list-group list-group-unbordered">
        <li class="list-group-item">
          <b>Email</b><a class="pull-right"><?= $user->email?></a>
        </li>

        <li class="list-group-item">
          <b>Phone Number</b><a class="pull-right"><?= $user->phonenumber?></a>
        </li>

        <li class="list-group-item">
          <b>Status</b><a class="pull-right"><?= $user->status_str?></a>
        </li>
      </ul>

    </div>
  </div>

  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">Address Information</h3>
      <div class="box-body">
        <ul class="list-group list-group-unbordered">
          <li class="list-group-item"><b>Address</b><span class="pull-right"><?= $user->address->address?></span></li>
          <li class="list-group-item"><b>City</b><span class="pull-right"><?= $user->address->city?></span></li>
          <li class="list-group-item"><b>State</b><span class="pull-right"><?= $user->address->state?></span></li>
          <li class="list-group-item"><b>Zip</b><span class="pull-right"><?= $user->address->zip?></span></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="col-md-3">
  <div class="pull-right">
    <a class="btn btn-success"  href="/dashboard">Back</a>
  </div>
</div>
@endsection
