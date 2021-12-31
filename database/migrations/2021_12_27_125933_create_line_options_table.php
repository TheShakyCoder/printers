<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLineOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lines_options', function (Blueprint $table) {
            $table->id();
            $table->integer('line_id');
            $table->integer('option_id');
            $table->boolean('enabled')->default(false);
            $table->integer('value')->nullable()->default(null);
            $table->timestamps();
            $table->unique(['line_id', 'option_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lines_options');
    }
}
