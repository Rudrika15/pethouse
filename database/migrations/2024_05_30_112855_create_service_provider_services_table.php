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
        Schema::create('service_provider_services', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('service_provider_id');
            $table->bigInteger('service_id');//here is category id
            $table->string("status")->enum('status',['Active','InActive'])->default("Active");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_provider_services');
    }
};
