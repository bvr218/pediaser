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
        DB::statement("DROP TABLE IF EXISTS `productos`");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("CREATE TABLE `pediaser`.`productos` (
            `id` INT(100) NOT NULL AUTO_INCREMENT , 
            `nombre` VARCHAR(100) NOT NULL , 
            `imagen` VARCHAR(200) NOT NULL ,
            `categoria` INT(100) NOT NULL , PRIMARY KEY (`id`)
            ) ENGINE = InnoDB;");
    }
};
