@extends('blank')
@section('content')
<style>
    .content {
        font-family: 'Lato';
        font-weight: bold;
    }

    .title {
        font-size: 96px;
    }
</style>
<div class="container">
    <div class="content">
        <div class="title text-center logo-lg">Welcome to <b>Utility</b>CRM</div>
    </div>
    <div class="row">
      <div class="col-md-3">
      </div>
      <div class="col-md-6">

        <div class="row">
          <p class="text-center" style="font-size:20;">UtilityCRM is a Customer Relationship Management System for Utility companies.</p>
          <p class="text-center" style="font-size:20;">Features</p>
          <p class="text-center">
            <a href="/auth/login" class="btn btn-success"><b>Login</b></a>
            <a href="/auth/register" class="btn btn-info"><b>Register</b></a>
          </p>
        </div>

        <div class="row box box-success">
          <div class="col-md-4">
            <h3 class="text-center">Basic</h3>
            <hr>
             Manage 250,000 Users
            <hr>
            Scale user limit as needed.
            <hr>
            $25 per month
            <hr>
          </div>
          <div class="col-md-4">
            <h3 class="text-center">Standard</h3>
            <hr>
             Manage 500,000 Users
            <hr>
            Scale user limit as needed.
            <hr>
            $50 per month
            <hr>
          </div>
          <div class="col-md-4">
            <h3 class="text-center">Premium</h3>
            <hr>
             Manage 1.25 Million Users
            <hr>
            Scale user limit as needed.
            <hr>
            $75 per month
            <hr>
          </div>
        </div>

      </div>
    </div>
</div>
@endsection
