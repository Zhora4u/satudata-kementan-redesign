<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable(); // image, document, video
            $table->string('path');
            $table->string('disk')->default('public');
            $table->string('collection')->nullable();
            $table->morphs('model'); // model_type, model_id
            $table->string('mime_type')->nullable();
            $table->integer('size')->nullable();
            $table->json('meta')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
