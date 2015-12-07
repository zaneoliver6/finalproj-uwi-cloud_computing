@extends('app')

@section('title')
{{ $title }}
@endsection

@section('subtitle')
{{ $sub }}
@endsection

@section('content')
<div class="pull-right" style="padding-bottom:20">
  <a class="btn btn-success"  href="/dashboard">Back</a>
</div>
<table id="requests" class="table table-striped table-bordered table-hover table-responsive table-condensed" cellspacing="0" style="border-color:#00a65a">
  <thead>
    <tr>
      <th style="border-color:#00a65a">Customer Name</th>
      <th style="border-color:#00a65a">Subject</th>
      <th style="border-color:#00a65a">Type</th>
      <th style="border-color:#00a65a">Body</th>
      <th style="border-color:#00a65a">Date</th>
    </tr>
  </thead>
  <tbody>
    <?foreach($reqs as $req) {
      ?>
      <tr>
        <th style="border-color:#00a65a"><?= $req->user->full_name?></th>
        <td style="border-color:#00a65a"><?= $req->subject?></td>
        <td style="border-color:#00a65a"><?= $req->type?></td>
        <td style="border-color:#00a65a"><?= $req->complaint?></td>
        <td style="border-color:#00a65a"><? $date = new \Datetime($req->created_at); echo $date->format('Y-m-d');?></td>
      </tr>
      <?
    }?>
  </tbody>
</table>
@endsection
