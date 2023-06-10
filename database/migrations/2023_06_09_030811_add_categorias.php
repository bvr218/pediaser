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
        DB::statement("INSERT INTO categorias (categoria, imagen, codigo)
        VALUES
            ('Analgésicos', '', 'ANA'),
            ('Antipiréticos', '', 'ANT'),
            ('Antiinflamatorios', '', 'ANTINF'),
            ('Antihistamínicos', '', 'ANTHIST'),
            ('Antibióticos', '', 'ANTIB'),
            ('Antivirales', '', 'ANTIV'),
            ('Antifúngicos', '', 'ANTIF'),
            ('Antiparasitarios', '', 'ANTIPAR'),
            ('Antidepresivos', '', 'ANTIDEP'),
            ('Antipsicóticos', '', 'ANTIPSI'),
            ('Antihipertensivos', '', 'ANTIHIP'),
            ('Diuréticos', '', 'DIUR'),
            ('Anticoagulantes', '', 'ANTICOAG'),
            ('Antiagregantes plaquetarios', '', 'AAP'),
            ('Medicamentos para la diabetes', '', 'DIAB'),
            ('Medicamentos para el control de la tiroides', '', 'TIRO'),
            ('Medicamentos para enfermedades respiratorias', '', 'RESP'),
            ('Medicamentos cardiovasculares', '', 'CARDIO'),
            ('Medicamentos para enfermedades gastrointestinales', '', 'GI'),
            ('Medicamentos para trastornos del sueño', '', 'SUEÑO');");
        DB::statement("ALTER TABLE `productos` ADD `marca` VARCHAR(100) NOT NULL AFTER `categoria`;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('categorias')->whereIn('codigo', ['ANA', 'ANT', 'ANTINF', 'ANTHIST', 'ANTIB', 'ANTIV', 'ANTIF', 'ANTIPAR', 'ANTIDEP', 'ANTIPSI', 'ANTIHIP', 'DIUR', 'ANTICOAG', 'AAP', 'DIAB', 'TIRO', 'RESP', 'CARDIO', 'GI', 'SUEÑO'])->delete();
       
    }
};
