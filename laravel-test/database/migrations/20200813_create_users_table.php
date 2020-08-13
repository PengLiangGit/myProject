<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbuser', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username');
            $table->string('email');
            $table->string('address');
            $table->string('address2');
            $table->string('country');
            $table->string('state');
            $table->string('zip_code');
            $table->timestamps('created_at');
            $table->timestamps('updated_at');
        });

        // create table tbuser (
        //     user_id     INT(11) AUTO_INCREMENT NOT NULL,
        //     first_name  varchar(30) not null,
        //     last_name   varchar(30) ,
        //     username    varchar(20) ,
        //     email       varchar(100) ,
        //     address     varchar(100) ,
        //     address2    varchar(100) ,
        //     country     varchar(50) ,
        //     state       varchar(50) ,
        //     zip_code         varchar(10),
        //     created_at    timestamp not null,
        //     updated_at    timestamp not null,
        //     PRIMARY KEY (user_id));
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbuser');
    }
}
