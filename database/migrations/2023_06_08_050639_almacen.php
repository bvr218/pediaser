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
        CREATE TABLE `almacen` (
            `id` int(100) NOT NULL,
            `valor` varchar(100) NOT NULL,
            `iva` varchar(100) NOT NULL,
            `lote` varchar(100) NOT NULL,
            `vencimiento` datetime NOT NULL,
            `cantidad` varchar(100) NOT NULL,
            `producto` varchar(200) NOT NULL,
            `codigo` varchar(100) NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
        ");
        DB::statement("
        ALTER TABLE `almacen`
            ADD PRIMARY KEY (`id`);
        ");
        DB::statement("
        ALTER TABLE `almacen`
        MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP TABLE IF EXISTS `almacen`");
    }
};
