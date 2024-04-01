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
        Schema::create('teacher_sallary_logs', function (Blueprint $table) {
            $table->id();
            $table->integer("teacher_id")->comment("teacher_id=User_id");
            $table->integer("stream_id")->comment("stream_id=User_id")->nullable;
            $table->integer("subject")->comment("subject_id=User_id")->nullable;
            $table->integer("term_id")->comment("term__id=User_id")->nullable;
            $table->integer("privious_salary")->nullable;
            $table->integer("present_salary")->nullable;
            $table->integer("increment_salary")->nullable;
            $table->integer("effected_salary")->nullable;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_sallary_logs');
    }
};
