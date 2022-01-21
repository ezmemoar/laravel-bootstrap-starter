<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionGroupTable extends Migration
{
    public function up()
    {
        Schema::create('permission_group', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('guard_name');
        });
    }

    public function down()
    {
        Schema::dropIfExists('permission_group');
    }
}
