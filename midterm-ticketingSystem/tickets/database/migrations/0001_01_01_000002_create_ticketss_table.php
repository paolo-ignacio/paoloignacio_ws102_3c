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
        Schema::create('ticketss', function (Blueprint $table) {
            $table->id();
            $table->string('title')->index();
            $table->longText('description');
            $table->string('category');
            $table->string('priority');
            $table->string('status');
            $table->foreignId('user_id')->constrained('userss')->onDelete('cascade');
            $table->string('agent_id');
            $table->dateTime('updated_at');
            $table->dateTime('created_at');
        });

    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticketss');

    }
};
