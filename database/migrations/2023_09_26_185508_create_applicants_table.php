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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('document')->unique();
            $table->string('gender', '45')->nullable();
            $table->integer('social_class')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('address', '100')->nullable();
            $table->timestamps();

            // Relationship with table degrees
            // Help with tabine
            $table->unsignedBigInteger('degree_id')->nullable();
            $table->foreign('degree_id')
                ->references('id')
                ->on('degrees')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            // Relationship with table users
            // Help with tabine
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicants');
    }
};
