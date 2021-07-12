<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsorplansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsorplans', function (Blueprint $table) {
            $table->id();
            $table->char('name', 50)->unique();
            $table->char('slug', 50)->unique();
            $table->decimal('pricing', 8,2);
            $table->integer('duration_in_hours', 5);
            $table->text('description');
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
        Schema::dropIfExists('sponsorplans');
    }
}
