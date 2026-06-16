<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contracts', function (Blueprint $table) {

            $table->id();

            $table->foreignId('project_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('client_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('freelancer_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->enum('status', [
                'active',
                'completed',
                'cancelled'
            ])->default('active');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};