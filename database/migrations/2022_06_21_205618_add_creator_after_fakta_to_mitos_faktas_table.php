<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCreatorAfterFaktaToMitosFaktasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mitos_faktas', function (Blueprint $table) {
            $table->string('creator')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mitos_faktas', function (Blueprint $table) {
            Schema::dropIfExists('mitos_faktas');
        });
    }
}
