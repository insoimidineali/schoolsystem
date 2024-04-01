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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('usertype')->nullable()->comment('Admin,Student,Parent,Teacher');
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('mobile')->nullable();
            $table->string("address")->nullable();
            $table->string("gender")->nullable();
            $table->string("images")->nullable();
            $table->string("fathername")->nullable();
            $table->string("mothername")->nullable();
            $table->string("religion")->nullable();
            $table->string("id_number")->nullable();
            $table->string("birthday")->nullable(); //understand
            $table->string("code")->nullable();
            $table->string("role")->nullable()->comment("admin=head of software,operator=teachers,user =students,guest= parents");
            $table->date("join_date")->nullable();
            $table->integer("designation_id")->nullable();
            $table->double("salary")->nullable();
            $table->tinyInteger("status")->default(1)->nullable()->comment("0=inactive,1=active");
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
