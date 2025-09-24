<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('pcs', function (Blueprint $table) {
            // adjust precision if you need larger numbers
            $table->decimal('sales', 12, 2)->default(0)->after('name');
            $table->date('sale_date')->nullable()->after('sales'); // ✅ added sale_date
        });
    }

    public function down(): void
    {
        Schema::table('pcs', function (Blueprint $table) {
            $table->dropColumn(['sales', 'sale_date']); // ✅ drop both when rolling back
        });
    }
};
