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
        Schema::create('package_link_keys', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("key_id");
            $table->bigInteger("package_id");
            $table->string("status")->enum('status',['Active','InActive'])->default("Active");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_link_keys');
    }
};
