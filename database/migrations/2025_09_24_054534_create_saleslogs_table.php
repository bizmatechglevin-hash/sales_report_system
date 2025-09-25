<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('saleslogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pc_id')->constrained()->onDelete('cascade');
            $table->foreignId('branch_id')->constrained()->onDelete('cascade'); 
            $table->string('pcname');
            $table->string('ssid')->nullable();
            $table->decimal('coins', 8, 2);  // ₱5, ₱10
            $table->integer('credits');      // minutes
            $table->timestamps();            // created_at = date/time
        });
    }

    public function down(): void
    {
        Schema::table('saleslogs', function (Blueprint $table) {
            $table->dropColumn('pcname');
        });
        Schema::dropIfExists('saleslogs');
    }
};

