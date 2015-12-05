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
      <img class="profile-user-img img-responsive img-circle" src="/dist/img/avatar.png" alt="<?= $customer->full_name?> profile picture">
      <h3 class="profile-username text-center"><?= $customer->full_name?></h3>

      <ul class="list-group list-group-unbordered">
        <li class="list-group-item">
          <b>Email</b><a class="pull-right"><?= $customer->email?></a>
        </li>

        <li class="list-group-item">
          <b>Phone Number</b><a class="pull-right"><?= $customer->phonenumber?></a>
        </li>

        <li class="list-group-item">
          <b>Status</b><a class="pull-right"><?= $customer->status_str?></a>
        </li>
      </ul>

    </div>
  </div>

  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">Address Information</h3>
      <div class="box-body">
        <ul class="list-group list-group-unbordered">
          <li class="list-group-item"><b>Address</b><span class="pull-right"><?= $customer->address->address?></span></li>
          <li class="list-group-item"><b>City</b><span class="pull-right"><?= $customer->address->city?></span></li>
          <li class="list-group-item"><b>State</b><span class="pull-right"><?= $customer->address->state?></span></li>
          <li class="list-group-item"><b>Zip</b><span class="pull-right"><?= $customer->address->zip?></span></li>
        </ul>
      </div>
    </div>
  </div>
  <? if($cntUsages > 0 ) {
    $usages = $customer->usages;
    ?>
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Usage Information</h3><span class="pull-right">Statement Date</span>
        <div class="box-body">
          <ul class="list-group list-group-unbordered">
            <? foreach($usages as $usage) {
                $sd = new \Datetime($usage->statementDate);
              ?>
            <li class="list-group-item">
              <b><?= $usage->amount . ' ' . $usage->units?></b><span class="pull-right"><?= $sd->format('Y-m-d')?></span></li>
            </li>
            <?}?>
          </ul>
        </div>
      </div>
    </div>
  <? }  ?>
</div>
<div class="col-md-3">
  <div class="pull-right">
    <a class="btn btn-success" href="/customer/edit/<?= $customer->id?>">Edit Customer</a>
    <a class="btn btn-success"  href="/customers">Back</a>
  </div>
</div>
@endsection
