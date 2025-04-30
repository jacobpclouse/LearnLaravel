<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Created using this: php artisan make:migration add_fields_to_your_entries_table --table=your_entries

// after editing the fields, update the database by running: ./vendor/bin/sail artisan migrate

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('your_entries', function (Blueprint $table) {
            //
            $table->string('requestor')->nullable();
            $table->string('assignee')->nullable();
            $table->string('tags')->nullable();
            $table->integer('priority')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('your_entries', function (Blueprint $table) {
            //
            $table->dropColumn(['requestor','assignee','tags','priority']);
        });
    }
};
