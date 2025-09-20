<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
      Schema::create('pcs', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('branch_id'); // ✅ link to branches
    $table->string('name'); // example column
    $table->timestamps();

    // Foreign key (optional but recommended)
    $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
});
    }

    public function down(): void
    {
        Schema::dropIfExists('pcs');
    }
};
