<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbproductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbproduct', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('product_name');
            $table->string('product_count');
            $table->string('username');
            $table->string('product_price');
        });

        // create table tbproduct (
        //     id    INT(11) AUTO_INCREMENT NOT NULL,
        //     user_id    INT(11),
        //     product_name    varchar(50) not null,
        //     product_count  integer,
        //     username    varchar(20) ,
        //     product_price    varchar(100),
        //     PRIMARY KEY (id));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbproduct');
    }
}
