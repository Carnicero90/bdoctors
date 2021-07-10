<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsorPlanUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsor_plan_user', function (Blueprint $table) {
            $table->id();
            // TODO: aggiungi ondelete
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
            ->references('id')
            ->on('users');
            $table->unsignedBigInteger('sponsor_plan_id');
            $table->foreign('sponsor_plan_id')
            ->references('id')
            ->on('sponsor_plans');
            $table->date('order_date');
            $table->date('end_date');
            $table->char('invoice');
            $table->boolean('success');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sponsor_plan_user');
    }
}
