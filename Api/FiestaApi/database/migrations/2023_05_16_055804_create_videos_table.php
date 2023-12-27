<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id('id_video');
            $table->string('name');
            $table->boolean('blocked')->default(false);
            $table->boolean('unblocked')->default(true);
            $table->text('video');
            $table->string('desc');
            $table->bigInteger('user_id')->unsigned();





            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE videos ADD preview LONGBLOB");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
