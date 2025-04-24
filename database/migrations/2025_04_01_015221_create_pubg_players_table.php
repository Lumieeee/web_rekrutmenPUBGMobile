<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menjalankan migration untuk membuat tabel pubg_players.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pubg_players', function (Blueprint $table) {
            $table->id(); // Menambahkan kolom ID auto-increment
            $table->string('pubg_id')->unique(); // ID akun PUBG
            $table->string('name');             // Nama pemain
            $table->decimal('kd', 5, 2);        // KD (Kill/Death ratio)
            $table->decimal('win_ratio', 5, 2); // Win Ratio
            $table->decimal('accuracy', 5, 2);  // Accuracy
            $table->decimal('headshot_rate', 5, 2); // Headshot rate
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at
        });
    }

    /**
     * Membalikkan perubahan dengan menghapus tabel pubg_players.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pubg_players');
    }
};
