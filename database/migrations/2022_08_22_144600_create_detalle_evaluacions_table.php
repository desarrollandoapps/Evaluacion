<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleEvaluacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_evaluacions', function (Blueprint $table) {
            $table->id();
            $table->string('criterio1');
            $table->integer('puntaje1');
            $table->string('criterio2');
            $table->integer('puntaje2');
            $table->string('criterio3');
            $table->integer('puntaje3');
            $table->string('criterio4');
            $table->integer('puntaje4');
            $table->string('criterio5');
            $table->integer('puntaje5');
            $table->string('criterio6');
            $table->integer('puntaje6');
            $table->string('criterio7');
            $table->integer('puntaje7');
            $table->string('criterio8');
            $table->integer('puntaje8');
            $table->string('criterio9');
            $table->integer('puntaje9');
            $table->string('criterio10');
            $table->integer('puntaje10');

            $table->string('capAcomp1');
            $table->string('capAcomp2');
            $table->string('capAcomp3');
            $table->string('capAcomp4');
            $table->string('capEjec1');
            $table->string('capEjec2');

            $table->string('observaciones');
            
            $table->foreignId('evaluacion_id')->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_evaluacions');
    }
}
