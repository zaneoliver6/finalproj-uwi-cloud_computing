<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTable extends Migration
{
  public function up() {
    Schema::create('clients', function(Blueprint $table) {
      $table->increments('id');
      $table->string('companyName');
      $table->string('type');
      $table->string('subscriptionType');
      $table->integer('active');
      $table->timestamps();
    });
  }

  public function down()
  {
      Schema::drop('clients');
  }
}


 ?>
