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
        // create migration table sql database
        $table->id();

        // foreign key to users table
        $table->foreignId('user_id_fk')->constrained()->onDelete('cascade');
        $table->string('title');
        $table->enum('category',['career','health','personal','finance','study','work','other'])->default('other');
        $table->text('description')->nullable();
        $table->enum('status',['pending','in_progress','completed'])->default('pending');
        $table->date('due_date')->nullable();
        $table->int('reminder_count')->default(0);
        $table->dateTime('reminder_time')->nullable();
        $table->dateTime('next_reminder_at')->nullable();
        $table->tinyint('mandatory_reason_required')->defualt(0);
        // $table->text('mandatory_reason')->nullable();
        $table->enum('priority',['low','medium','high'])->default('medium');
        $table->timestamps();

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // excute the migration table on sql
        Schema::dropIfExists('tasks');
    }
};
