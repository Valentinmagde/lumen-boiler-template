<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftDeleteToApiConsumers extends Migration
{
    public function up()
    {
        Schema::table('Api_Consumers', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('Api_Consumers', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
