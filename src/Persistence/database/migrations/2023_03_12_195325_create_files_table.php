<?php

use Abacus\Files\Package;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(Package::DB_PREFIX . '_files', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('fileable_id');
            $table->string('fileable_type');
            $table->string('path');
            $table->string('name')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Package::DB_PREFIX . '_files');
    }
};
