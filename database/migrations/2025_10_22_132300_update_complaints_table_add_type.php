<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('complaints', function (Blueprint $table) {
            $table->enum('type', ['pengaduan', 'aspirasi'])->default('pengaduan')->after('id');
            $table->text('suggestion')->nullable()->after('content');
            $table->renameColumn('content', 'description');
        });
    }

    public function down()
    {
        Schema::table('complaints', function (Blueprint $table) {
            $table->dropColumn(['type', 'suggestion']);
            $table->renameColumn('description', 'content');
        });
    }
};
