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
            $table->text('soal');
            $table->text('jawabanA');
            $table->text('jawabanB');
            $table->text('jawabanC');
            $table->text('jawabanD');
            $table->text('jawabanE');
            $table->string('jawabanBenar',1);
            $table->enum('TrueFalse', ['True', 'False']);
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
