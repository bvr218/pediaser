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
        DB::statement("CREATE TABLE `pediaser`.`categorias` (
            `id` INT NOT NULL AUTO_INCREMENT , 
            `categoria` VARCHAR(100) NOT NULL , 
            `imagen` VARCHAR(200) NOT NULL , PRIMARY KEY (`id`)
            ) ENGINE = InnoDB;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP TABLE `categorias`");
    }
};
