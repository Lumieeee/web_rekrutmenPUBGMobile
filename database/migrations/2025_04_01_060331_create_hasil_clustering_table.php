<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('hasil_clustering', function (Blueprint $table) {
            $table->id();
            $table->string('pubg_id');
            $table->string('name');
            $table->decimal('kd', 5, 2);
            $table->decimal('win_ratio', 5, 2);
            $table->decimal('accuracy', 5, 2);
            $table->decimal('headshot_rate', 5, 2);
            $table->string('cluster_status'); // Status hasil clustering
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hasil_clustering');
    }
};
