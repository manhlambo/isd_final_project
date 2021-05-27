<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            $table->decimal('oral', 3, 1)->nullable();
            $table->decimal('midterm', 3, 1)->nullable();
            $table->decimal('final', 3,1)->nullable();
            $table->decimal('overall', 3, 1)->nullable();
            $table->foreignId('subject_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('student_id')->nullable()->constrained()->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marks');
    }
}
