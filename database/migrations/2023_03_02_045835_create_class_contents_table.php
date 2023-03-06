<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id'); 
            $table->unsignedBigInteger('batch_id'); 
            $table->unsignedBigInteger('chapter_id');
            $table->string('blog_class_name')->nullable(); 
            $table->string('content_type')->nullable(); 
            $table->integer('blog_id')->nullable(); 
            $table->string('class_video')->nullable(); 
            $table->text('class_desc')->nullable(); 
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('batch_id')->references('id')->on('batches')->onDelete('cascade');
            $table->foreign('chapter_id')->references('id')->on('chapters')->onDelete('cascade');
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
        Schema::dropIfExists('class_contents');
    }
};
