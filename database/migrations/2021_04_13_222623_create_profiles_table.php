<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('phone')->nullable();
            $table->string('profession')->nullable();
            $table->string('location')->nullable();
            $table->string('education')->nullable();
            $table->string('industry')->nullable();
            $table->enum('expertise', ['Beginner', 'Intermediate', 'Advanced'])->nullable();
            $table->enum('gender', ['Male', 'Female', 'Others'])->nullable();
            $table->string('image')->nullable();
            $table->boolean('public')->default(false);
            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
