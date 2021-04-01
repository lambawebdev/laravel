<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('users')->insert(
            array(
                'name' => 'admin',
                'email' => 'admin@mail.com',
                'password' => '11223344',
            )
        );

        DB::table('roles')->insert(
            array(
                'name' => 'admin',
            )
        );

        DB::table('user_role')->insert(
            array(
                'user_id' => '1',
                'role_id' => '1',
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
}
