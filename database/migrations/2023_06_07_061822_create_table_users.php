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
        DB::statement('CREATE TABLE `users` (
                                            `id` INT(20) NOT NULL AUTO_INCREMENT , 
                                            `name` VARCHAR(100) NOT NULL , 
                                            `username` VARCHAR(100) NOT NULL , 
                                            `password` VARCHAR(100) NOT NULL , 
                                            `level` INT(2) NOT NULL , 
                                            `correo` VARCHAR(40) NOT NULL , 
                                            `key_verified` VARCHAR(40) NULL , 
                                            `created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
                                            `updated` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
                                            `email_verification` INT(1) NOT NULL , 
                                            PRIMARY KEY (`id`)
                                            ) ENGINE = InnoDB;');

        DB::statement('ALTER TABLE `users` ADD UNIQUE(`username`, `correo`);');
        DB::statement('ALTER TABLE `users` CHANGE `email_verification` `email_verification` INT(1) NOT NULL DEFAULT "0";');
        DB::statement('ALTER TABLE `users` ADD `permisos` VARCHAR(400) NOT NULL AFTER `email_verification`;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
