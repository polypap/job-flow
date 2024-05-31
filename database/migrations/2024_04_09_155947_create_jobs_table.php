<?php

use App\Models\Category;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('salary')->default("0");
            $table->string('location')->default("US");
            $table->foreignIdFor(User::class)->nullable();
            $table->unsignedTinyInteger('status')->default(1);
            $table->date('open_date')->nullable();
            $table->date('close_date')->nullable();
            $table->enum('experience', Job::$experience)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropForeignIdFor(User::class);
        });
        Schema::dropIfExists('jobs');
        
    }
};
