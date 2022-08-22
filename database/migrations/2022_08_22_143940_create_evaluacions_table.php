<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluacions', function (Blueprint $table) {
            $table->id();
            $table->date('fecha')->useCurrent();
            $table->string('comite');
            $table->double('viabFormulacion');
            $table->double('viabInnovacion');
            $table->double('viabMercado');
            $table->double('viabPromedio');
            $table->string('observaciones');
            $table->string('recomendaciones');
            $table->foreignId('idea_id')->constrained();
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
        Schema::dropIfExists('evaluacions');
    }
}
