@extends('app')

@section('title')
{{ $title }}
@endsection

@section('subtitle')
{{ $sub }}
@endsection

@section('content')

<div class="col-md-4">
  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">Bill</h3>
      <div class="box-body">
        <ul class="list-group list-group-unbordered">
          <li class="list-group-item"><b>Package</b><span class="pull-right"><?=  "$" . money_format('%i' ,$subtotal)?></span></li>
          <?$total = $subtotal;
            if(count($additional > 0)) {?>
            <li class="list-group-item"><b>Additional Use</b></li>
            <?foreach($additional  as $add) {
              $total += $add['cost'];
              ?>
            <li class="list-group-item"><b><?= number_format($add['amt']) .' for ' . $add['days'] . ' days'?></b><span class="pull-right"><?= "$" . money_format('%i', $add['cost'])?></span></li>
              <?}
            }?>
            <li class="list-group-item"><b>Total</b><span class="pull-right"><?= "$" . money_format('%i',$total)?></span></li>
        </ul>
      </div>
    </div>
  </div>
</div>

@endsection
