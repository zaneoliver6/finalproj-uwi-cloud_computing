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
      <h3 class="box-title">Usage Information</h3><span class="pull-right">Statement Date</span>
      <div class="box-body">
        <ul class="list-group list-group-unbordered">

          <li class="list-group-item">
            <b>450 Gallons</b><span class="pull-right">2015-12-28</span></li>
          </li>
        </ul>
        <h4>$50</h4>
      </div>
    </div>
  </div>
</div>

@endsection
