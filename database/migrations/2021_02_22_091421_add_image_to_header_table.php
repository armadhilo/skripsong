<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToHeaderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('header', function (Blueprint $table) {
            $table->text('img_pas_foto')->after('img_kompetensi');
            $table->text('img_ktp')->after('img_pas_foto');
            $table->text('img_sertifikat_kesehatan')->after('img_ktp');
            $table->text('img_bukti_pembayaran')->after('img_sertifikat_kesehatan');
            $table->text('img_ijazah')->after('img_bukti_pembayaran');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('header', function (Blueprint $table) {
            $table->dropColumn('img_pas_foto');
            $table->dropColumn('img_ktp');
            $table->dropColumn('img_sertifikat_kesehatan');
            $table->dropColumn('img_bukti_pembayaran');
            $table->dropColumn('img_ijazah');
        });
    }
}
