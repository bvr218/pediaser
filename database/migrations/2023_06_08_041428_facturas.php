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
        DB::statement("CREATE TABLE `pediaser`.`facturas` (
                                            `id` INT NOT NULL AUTO_INCREMENT , 
                                            `tipo` VARCHAR(20) NOT NULL DEFAULT 'servicio' , 
                                            `fecha_creacion` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
                                            `facturador` INT(100) NOT NULL , 
                                            `identificacion` INT(100) NULL DEFAULT NULL , 
                                            `nombre_paciente` VARCHAR(200) NULL DEFAULT 'Publico en General' ,
                                            `tipo_pago` VARCHAR(200) NOT NULL ,
                                            `recibido` VARCHAR(100) NULL DEFAULT NULL ,
                                            `unique` VARCHAR(200) NOT NULL , 
                                            PRIMARY KEY (`id`)) ENGINE = InnoDB;");
        DB::statement("
        ALTER TABLE `facturas` ADD `estado` INT(1) NOT NULL DEFAULT '0' AFTER `unique`;
    ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP TABLE `facturas`");
    }
};
