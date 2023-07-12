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
            CREATE TABLE `items_factura` (
                `id` int(11) NOT NULL,
                `factura_unique` varchar(100) NOT NULL,
                `tipo` varchar(100) NOT NULL DEFAULT 'servicio',
                `id_elemento` varchar(100) NOT NULL,
                `cantidad` int(10) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
            ");
        DB::statement("ALTER TABLE `items_factura`
        ADD PRIMARY KEY (`id`)");

        DB::statement("ALTER TABLE `items_factura`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;");
         DB::statement("
         ALTER TABLE `items_factura` ADD `precio_venta` VARCHAR(100) NOT NULL AFTER `id_elemento`;
     ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP TABLE `items_factura`");
    }
};
