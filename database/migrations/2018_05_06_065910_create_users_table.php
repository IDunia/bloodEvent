<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name',35);
            $table->string('surname',35);
            $table->string('email',62)->unique();
            $table->char('password',60);
            $table->enum('role', ['admin', 'user']);
            $table->enum('gender',['m','f']);
            $table->date('birthday');  
            $table->string('occupation',35);
            $table->string('phone',12);
            $table->string('photo',100); 
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
