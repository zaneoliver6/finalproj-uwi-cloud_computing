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
  <div class="info-box bg-red">
    <span class="info-box-icon"><i class="fa fa-users" style="padding-top:20;"></i></span>
    <div class="info-box-content">
      <span class="info-box-text">Users</span>
      <span class="info-box-number"><?= $cusCount?></span>
      <div class="progress">
        <div class="progress-bar" style="width: <?= ($cusCount/$user->client->subscription->limit)*100; ?>%"></div>
      </div>
      <span class="progress-description">
        You have <?=$cusCount?> out of a limit of <?= number_format($user->client->subscription->limit)?> users.
      </span>
    </div>
  </div>

  <div class="col-md-12">
    <hr/>
    <h2 class="text-center">Increase your customer limit</h2>
  </div>
  <div class="col-md-6">
    <a href="/subscription/scaleup/10000" class="btn btn-success btn-block">+ 10,000</a>
    <a href="/subscription/scaleup/20000" class="btn btn-success btn-block">+ 20,000</a>
    <a href="/subscription/scaleup/30000" class="btn btn-success btn-block">+ 30,000</a>
    <a href="/subscription/scaleup/40000" class="btn btn-success btn-block">+ 40,000</a>
    <a href="/subscription/scaleup/50000" class="btn btn-success btn-block">+ 50,000</a>
  </div>
  <div class="col-md-6">
    <a href="/subscription/scaleup/100000" class="btn btn-success btn-block">+ 100,000</a>
    <a href="/subscription/scaleup/200000" class="btn btn-success btn-block">+ 200,000</a>
    <a href="/subscription/scaleup/300000" class="btn btn-success btn-block">+ 300,000</a>
    <a href="/subscription/scaleup/400000" class="btn btn-success btn-block">+ 400,000</a>
    <a href="/subscription/scaleup/500000" class="btn btn-success btn-block">+ 500,000</a>
  </div>

</div>
<div class="col-md-4">
  <div class="info-box bg-yellow">
    <span class="info-box-icon"><i class="fa fa-calendar-times-o" style="padding-top:20;"></i></span>
    <div class="info-box-content">
      <span class="info-box-text">Subscription Date</span>
      <span class="info-box-number"><? $sd = new \Datetime($user->client->subscription->statementDate); echo $sd->format('Y-m-d');?></span>
      <span class="progress-description">
        Payment due <? $dd = new \Datetime($user->client->subscription->dueDate); echo $dd->format('Y-m-d');?>
      </span>
    </div>
  </div>

  <div class="col-md-12">
    <hr/>
    <h2 class="text-center">Decrease your customer limit</h2>
  </div>
  <div class="col-md-6">
    <a href="/subscription/scaledown/10000" class="btn btn-warning btn-block">- 10,000</a>
    <a href="/subscription/scaledown/20000" class="btn btn-warning btn-block">- 20,000</a>
    <a href="/subscription/scaledown/30000" class="btn btn-warning btn-block">- 30,000</a>
    <a href="/subscription/scaledown/40000" class="btn btn-warning btn-block">- 40,000</a>
    <a href="/subscription/scaledown/50000" class="btn btn-warning btn-block">- 50,000</a>
  </div>
  <div class="col-md-6">
    <a href="/subscription/scaledown/100000" class="btn btn-warning btn-block">- 100,000</a>
    <a href="/subscription/scaledown/200000" class="btn btn-warning btn-block">- 200,000</a>
    <a href="/subscription/scaledown/300000" class="btn btn-warning btn-block">- 300,000</a>
    <a href="/subscription/scaledown/400000" class="btn btn-warning btn-block">- 400,000</a>
    <a href="/subscription/scaledown/500000" class="btn btn-warning btn-block">- 500,000</a>
  </div>

</div>
<div class="col-md-4">
  <div class="info-box bg-blue">
    <span class="info-box-icon"><i class="fa fa-comments" style="padding-top:20;"></i></span>
    <div class="info-box-content">
      <span class="info-box-text">New Complaints &amp; Requests</span>
      <span class="info-box-number"><h2>100</h2></span>
    </div>
  </div>

  <div class="col-md-12">
    <hr/>
    <h2 class="text-center">Change your subscription</h2>
  </div>
  <div class="col-md-6">
    <? if($user->client->subscription->type == "standard") { ?>
    <a href="/subscription/change/basic" class="btn btn-info btn-block">Basic</a>
    <?} else if($user->client->subscription->type == "basic") {?>
      <a href="/subscription/change/standard" class="btn btn-info btn-block">Standard</a>
    <?} else if($user->client->subscription->type == "premium") {?>
        <a href="/subscription/change/basic" class="btn btn-info btn-block">Basic</a>
      <?}?>
  </div>
  <div class="col-md-6">
    <? if($user->client->subscription->type != 'premium') {?>
    <a href="/subscription/change/premium" class="btn btn-info btn-block">Premium</a>
    <?} else {?>
      <a href="/subscription/change/standard" class="btn btn-info btn-block">Standard</a>
    <?}?>

  </div>

</div>
@endsection
