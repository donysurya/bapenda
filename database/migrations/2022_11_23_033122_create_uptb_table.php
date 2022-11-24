<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uptb', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('peran');
            $table->longText('fungsi');
            $table->longText('layanan_pajak');
            $table->longText('wilayah_uptb');
            $table->text('jam_layanan');
            $table->string('image');
            $table->string('maps_uptb');
            $table->foreignId('updated_by')->nullable()->constrained('cms');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uptb');
    }
};
