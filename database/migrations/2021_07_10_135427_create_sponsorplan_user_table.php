<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsorplanUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsorplan_users', function (Blueprint $table) {
            $table->id();
            // TODO: aggiungi ondelete
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
            ->references('id')
            ->on('users');
            // ->onDelete('set null');
            $table->unsignedBigInteger('sponsorplan_id');
            $table->foreign('sponsorplan_id')
            ->references('id')
            ->on('sponsorplans');
            // ->onDelete('set null');
            $table->dateTime('order_date'); 
            $table->dateTime('end_date');
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
        Schema::dropIfExists('sponsorplan_users');
    }
}
