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
        DB::statement("CREATE TABLE `pediaser`.`pacientes` (`id` INT NOT NULL AUTO_INCREMENT , `nombres` VARCHAR(100) NOT NULL , `apellidos` VARCHAR(100) NOT NULL , `identificacion` INT(100) NOT NULL , `tipo_identificacion` VARCHAR(40) NOT NULL , `fecha_nacimento` DATE NOT NULL , `genero` VARCHAR(20) NOT NULL , `registro` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;");
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP TABLE `pediaser`.`pacientes`");
    }
};
