<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('todos', function (Blueprint $table) {
        $table->text('description')->nullable(); // Menambahkan kolom description
    });
}

public function down()
{
    Schema::table('todos', function (Blueprint $table) {
        $table->dropColumn('description'); // Menghapus kolom description jika migrasi dibatalkan
    });
}


};
