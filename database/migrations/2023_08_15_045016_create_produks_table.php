<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table ->string('nama_produk', 200);
            $table ->string('kode', 12);
            $table ->integer('stock');
            $table ->enum('kategori', ['makanan', 'minuman', 'sabun']);
            $table ->integer('harga');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }
    public function down()
    {
        Schema::dropIfExists('produk');
    }
};
