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
        Schema::table('complaints', function (Blueprint $table) {
            $table->enum('dusun', ['Dusun I', 'Dusun II', 'Dusun III', 'Dusun IV', 'Dusun V'])
                  ->nullable()
                  ->after('category')
                  ->before('location');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('complaints', function (Blueprint $table) {
            $table->dropColumn('dusun');
        });
    }
};
