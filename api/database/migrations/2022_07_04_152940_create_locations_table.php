<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use MStaack\LaravelPostgis\Schema\Blueprint;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->uuid();

            $table->string('title', 40);
            $table->text('description')->nullable();
            $table->double('latitude');
            $table->double('longitude');
            $table->point('location_geo', 'GEOGRAPHY', 4326);
            $table->point('location_geom', 'GEOMETRY', 27700);

            $table->foreignId('roll_id')->constrained()->cascadeOnDelete();

            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
};
