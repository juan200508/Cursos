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
        Schema::create('inscriptions_applicants', function (Blueprint $table) {
            // Relationship with table applicants
            // Help with tabine
            $table->unsignedBigInteger('applicant_id');
            $table->foreign('applicant_id')
                ->references('id')
                ->on('applicants')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            // Relationship with table inscriptions
            // Help with tabine
            $table->unsignedBigInteger('inscription_id');
            $table->foreign('inscription_id')
                ->references('id')
                ->on('inscriptions')
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
        Schema::dropIfExists('inscriptions_applicants');
    }
};
