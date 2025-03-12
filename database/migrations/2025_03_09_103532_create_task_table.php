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
        Schema::create('tb_task', function (Blueprint $table) {
            $table->id();
            $table->string('task_name');
            $table->string('description');
            $table->date('due_date');
            $table->enum('priority', ['Low', 'Medium', 'High']);
            $table->enum('status', ['Uncompleted', 'Completed']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_task');
    }
};
