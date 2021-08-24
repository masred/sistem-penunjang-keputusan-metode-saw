<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlternativeValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternative_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alternative_id');
            $table->foreignId('criteria_id');
            $table->foreignId('sub_criteria_id');
            $table->string('real_value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alternative_values');
    }
}
