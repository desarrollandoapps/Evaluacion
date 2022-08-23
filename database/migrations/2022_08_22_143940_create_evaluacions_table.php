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
            $table->string('comite')->nullable()->nullable();
            $table->double('viabFormulacion')->nullable();
            $table->double('viabInnovacion')->nullable();
            $table->double('viabMercado')->nullable();
            $table->double('viabPromedio')->nullable();
            $table->string('observaciones')->nullable();
            $table->string('recomendaciones')->nullable();
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
