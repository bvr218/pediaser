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
        
        DB::statement("
            CREATE TABLE `pediaser`.`pagos` (
                                    `id` INT NOT NULL AUTO_INCREMENT , 
                                    `factura_unique` VARCHAR(100) NOT NULL , 
                                    `fecha_creacion` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
                                    `forma_pago` VARCHAR(200) NOT NULL , 
                                    `pagado` VARCHAR(200) NOT NULL , PRIMARY KEY (`id`)
                                    ) ENGINE = InnoDB;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP TABLE IF EXISTS `pagos`");
        
    }
};
