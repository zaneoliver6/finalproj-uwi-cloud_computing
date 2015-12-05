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
<? if($cntUsages > 0 ) {
  $usages = $user->usages;
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

@endsection
