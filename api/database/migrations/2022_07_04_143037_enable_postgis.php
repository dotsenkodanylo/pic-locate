<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class EnablePostgis extends Migration
{
    /**
     * Run the migrations.
     *
     * NOTE: Ensure this is your first migration before you add MStaack based GIS points; otherwise you get SQL errors.
     *
     * @return void
     */
    public function up()
    {
        Schema::enablePostgisIfNotExists();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disablePostgisIfExists();
    }
}
