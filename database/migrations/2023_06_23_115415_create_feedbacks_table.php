<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbacksTable extends Migration
{
public function up()
{
Schema::create('feedbacks', function (Blueprint $table) {
$table->id();
$table->unsignedBigInteger('inquiry_id');
$table->unsignedBigInteger('customer_id');
$table->text('feedback')->nullable();
$table->timestamps();

$table->foreign('inquiry_id')->references('id')->on('inquiries')->onDelete('cascade');
$table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
});
}

public function down()
{
Schema::dropIfExists('feedbacks');
}
}
