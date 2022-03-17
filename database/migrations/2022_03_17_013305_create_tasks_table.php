<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();

            $table->string('task')
                ->nullable(false);

            $table->string('category');

            $table->integer('status')
                ->default('new');

            $table->date('start_date')
                ->nullable(false);

            $table->date('end_date')
                ->nullable();

            $table->boolean('state')
                ->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
