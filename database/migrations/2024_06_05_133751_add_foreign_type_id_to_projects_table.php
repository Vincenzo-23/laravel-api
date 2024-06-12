<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            //aggiungo la colonna type_id
            $table->unsignedBigInteger('type_id')->nullable()->after('id');

            //definisco il vincolo di relazione tra le colonne delle due tabelle projects e types
            $table->foreign('type_id')->references('id')->on('types')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            //rimuovo il vincolo tra le due tabelle projects e types
            $table->dropForeign('projects_type_id_foreign');

            //rimuovo la colonna type_id
            $table->dropColumn('type_id');
        });
    }
};
