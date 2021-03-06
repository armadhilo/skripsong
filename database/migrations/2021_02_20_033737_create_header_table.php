<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeaderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('header', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id')->constrained('user')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->foreignId('package_id')->constrained('package')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->integer('jumlahSoal');
            $table->integer('jumlahBenar')->nullable();
            $table->integer('jumlahSalah')->nullable();
            $table->string('lokasi');
            $table->string('profesi');
            $table->string('rating');
            $table->text('img_license');
            $table->text('img_ielp');
            $table->text('img_kompetensi');
            $table->string('status',1)->default('N');
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
        Schema::dropIfExists('header');
    }
}
