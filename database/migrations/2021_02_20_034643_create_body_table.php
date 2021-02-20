<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBodyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('body', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('header_id')->constrained('header')->onDelete('NO ACTION')->onUpdate('NO ACTION');;
            $table->enum('type', ['1', '2']);
            $table->text('soal');
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
        Schema::dropIfExists('body');
    }
}
