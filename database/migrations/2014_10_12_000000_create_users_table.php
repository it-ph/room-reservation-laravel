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
            $table->bigIncrements('id');
            $table->string('fullname');
            $table->string('username')->unique();
            $table->string('password');
            $table->tinyInteger('accountNonLocked')->default(1);
            $table->tinyInteger('accountNonExpired')->default(1);
            $table->tinyInteger('credentialsNonExpired')->default(1);
            $table->tinyInteger('enabled')->default(1);
            // $table->timestamp('email_verified_at')->nullable();
        
            $table->timestamps();
            //  $table->rememberToken();

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
