<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create(config('route-tracker.log_table'), function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('method');
            $table->string('route');
            $table->string('ip_address')->nullable();
            $table->string('previous_route')->nullable();
            $table->integer('duration')->nullable(); // time spent on previous page in seconds
            $table->string('session_id')->nullable()->index(); 
            $table->text('parameters')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(config('route-tracker.log_table'));
    }
};
