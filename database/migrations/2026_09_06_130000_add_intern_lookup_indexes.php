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
        Schema::table('professors', function (Blueprint $table) {
            $table->index('admin_id');
        });

        Schema::table('interns', function (Blueprint $table) {
            $table->index('professor_id');
            $table->index(['start_date', 'end_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('interns', function (Blueprint $table) {
            $table->dropIndex(['professor_id']);
            $table->dropIndex(['start_date', 'end_date']);
        });

        Schema::table('professors', function (Blueprint $table) {
            $table->dropIndex(['admin_id']);
        });
    }
};
