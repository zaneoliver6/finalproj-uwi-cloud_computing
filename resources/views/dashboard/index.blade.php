@extends('app')

@section('title')
{{ $title }}
@endsection

@section('subtitle')
{{ $sub }}
@endsection

@section('content')
<div class="col-md-4">
  <div class="info-box bg-red">
    <span class="info-box-icon"><i class="fa fa-users" style="padding-top:20;"></i></span>
    <div class="info-box-content">
      <span class="info-box-text">Users</span>
      <span class="info-box-number"><?= $cusCount?></span>
      <div class="progress">
        <div class="progress-bar" style="width: <?= ($cusCount/$subsLimit)*100; ?>%"></div>
      </div>
      <span class="progress-description">
        You have <?=$cusCount?> out of a limit of <?= number_format($subsLimit)?> users.
      </span>
    </div>
  </div>
</div>
@endsection
