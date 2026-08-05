<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        $table->id();
        $table->foreignId('task_id_fk')->constrained()->onDelete('cascade');
        $table->string('motivation');
        $table->enum('type',['quote','image','song','meme','nothing'])->default('nothing');
        $table->text('content')->nullable();
        $table->string('image_path')->nullable();
        $table->enum('channel',['email','sms','push_notification','none'])->default('none');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
