<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('package_id')->constrained('package')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('type', ['1', '2']);
            $table->longText('soal');
            $table->text('jawabanA')->nullable();
            $table->text('jawabanB')->nullable();
            $table->text('jawabanC')->nullable();
            $table->text('jawabanD')->nullable();
            $table->text('jawabanE')->nullable();
            $table->string('jawabanBenar',1)->nullable();
            $table->enum('TrueFalse', ['True', 'False'])->nullable();
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
        Schema::dropIfExists('soal');
    }
}
