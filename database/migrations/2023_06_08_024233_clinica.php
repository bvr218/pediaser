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
        DB::statement("CREATE TABLE `pediaser`.`clinica` (`id` INT NOT NULL AUTO_INCREMENT , `config` VARCHAR(100) NOT NULL , `value` VARCHAR(200) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;");
        DB::statement("INSERT INTO `clinica` (`id`, `config`, `value`) VALUES (NULL, 'nombre', 'Pediaser');");
        DB::statement("INSERT INTO `clinica` (`id`, `config`, `value`) VALUES (NULL, 'logo', 'images/logo-r.png');");
        DB::statement("INSERT INTO `clinica` (`id`, `config`, `value`) VALUES (NULL, 'moneda', '\$MXM');");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP TABLE `pediaser`.`clinica` ;");
    }
};
