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
        Schema::table('websocket_apps', function (Blueprint $table) {
            $table->string('path')->default('');
            $table->string('capacity')->nullable();
            $table->boolean('enable_client_messages')->default(false);
            $table->boolean('enable_statistics')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('websocket_apps', function (Blueprint $table) {
            $table->dropColumn(['path', 'capacity', 'enable_client_messages', 'enable_statistics']);
        });
    }
};
