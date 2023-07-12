<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $password = Hash::make("admin");
        DB::statement("INSERT INTO `users` (`id`, `name`, `username`, `password`, `level`, `correo`, `key_verified`, `created`, `updated`, `email_verification`, `permisos`) VALUES ('1', 'Administrador principal', 'admin', '".$password."', '0', 'bravaro2016@gmail.com', NULL, current_timestamp(), current_timestamp(), '0','{}')");
        DB::statement("INSERT INTO `users` (`id`, `name`, `username`, `password`, `level`, `correo`, `key_verified`, `created`, `updated`, `email_verification`, `permisos`) VALUES ('2', 'Administrador principal', 'pdv', '".$password."', '1', 'bravaro2016@gmail.com', NULL, current_timestamp(), current_timestamp(), '0','{}')");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DELETE FROM `users` where `users`.`id` = 1");
        DB::statement("DELETE FROM `users` where `users`.`id` = 2");
    }
};
