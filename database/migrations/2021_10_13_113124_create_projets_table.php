<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projets', function (Blueprint $table) {
            // je crée mes champs
            $table->id();
            $table->timestamps();
            $table->char('nom', 30);
            $table->date('date_debut');
            $table->date('date_fin');
            $table->string('etape');
            
            // je crée mes relation
            $table->unsignedBigInteger('document_id');
            $table->foreign('document_id')
                    ->references('id')
                    ->on('documents')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');

            $table->unsignedBigInteger('personne_id');
            $table->foreign('personne_id')
                    ->references('id')
                    ->on('personnes')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projets');
    }
}
