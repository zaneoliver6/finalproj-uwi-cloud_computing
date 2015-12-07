@extends('app')

@section('title')
{{ $title }}
@endsection

@section('subtitle')
{{ $sub }}
@endsection

@section('content')
<div class="pull-right" style="padding-bottom:20">
  <a class="btn btn-success"  href="customer/add">Add Customer</a>
  <a class="btn btn-success" href="<?= $active == 1 ? '/customers/0' : '/customers/1'?>"><?= $active == 1 ? 'View Inactive' : "View Active"?></a>
  <a class="btn btn-success"  href="/dashboard">Back</a>
</div>
<table id="customers" class="table table-striped table-bordered table-hover table-responsive table-condensed" cellspacing="0" style="border-color:#00a65a">
  <thead>
    <tr>
      <th style="border-color:#00a65a">Name</th>
      <th style="border-color:#00a65a">Email</th>
      <th style="border-color:#00a65a">Phone Number</th>
      <th style="border-color:#00a65a">Status</th>
      <th style="border-color:#00a65a">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?foreach($customers as $customer) {
      ?>
      <tr data-uid="<?= $customer->id?>">
        <td style="border-color:#00a65a"><?= $customer->full_name?></td>
        <td style="border-color:#00a65a"><?= $customer->email?></td>
        <td style="border-color:#00a65a"><?= $customer->phonenumber?></td>
        <td style="border-color:#00a65a"><?= $customer->status_str?></td>
        <td style="border-color:#00a65a">
          <a href="/customer/edit/<?= $customer->id?>" class="text-success" data-toggle="tooltip" title="Edit Customer"><i class="fa fa-pencil-square-o" style="padding-left:5"></i></a>
          <a href="/customer/view/<?= $customer->id?>" class="text-success" data-toggle="tooltip" title="View Customer"><i class="fa fa-file-text-o" style="padding-left:5"></i></a>
          <a href="/customer/email/<?= $customer->id?>" class="text-success" data-toggle="tooltip" title="Email Customer"><i class="fa fa-envelope-o" style="padding-left:5"></i></a>
          <? if($customer->active == 1) {
            ?>
              <a href="/customer/toggleStatus/<?= $customer->id?>" class="text-danger" data-toggle="tooltip" title="Deactivate"><i class="fa fa-times-circle-o" style="padding-left:5"></i></a>
            <?
          } else {
            ?>
            <a href="/customer/toggleStatus/<?= $customer->id?>" class="text-success" data-toggle="tooltip" title="Activate"><i class="fa fa-check-circle-o" style="padding-left:5"></i></a>
            <?
          }
          ?>
        </td>
      </tr>
      <?
    }?>
  </tbody>
</table>
@endsection
