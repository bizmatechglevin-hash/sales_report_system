<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name');                 // Branch name
            $table->string('code')->unique();       // Unique branch code
            $table->text('address');                // Branch address
            $table->string('phone')->nullable();    // Phone number
            $table->foreignId('manager_id')         // Branch manager (User)
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete();
            $table->boolean('is_active')->default(true); // Active or inactive
            $table->timestamps();                   // created_at & updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('branches');
    }
};
