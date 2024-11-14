<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
{
    Schema::table('todos', function (Blueprint $table) {
        $table->date('due_date')->nullable(); // Menambahkan kolom due_date
    });
}

public function down()
{
    Schema::table('todos', function (Blueprint $table) {
        $table->dropColumn('due_date'); // Menghapus kolom due_date jika migrasi dibatalkan
    });
}

};
