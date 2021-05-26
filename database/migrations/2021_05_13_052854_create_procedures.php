<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
        $procedure = 'DROP PROCEDURE IF EXISTS getAllUsers; CREATE PROCEDURE getAllUsers() BEGIN SELECT * FROM users; END';
        
        $userByID = "DROP PROCEDURE IF EXISTS get_users_by_userid;
        CREATE PROCEDURE get_users_by_userid (IN idx int)
        BEGIN
        SELECT * FROM users WHERE id = idx;
        END;";

        $insert = 'DROP PROCEDURE IF EXISTS insert_users; CREATE PROCEDURE `insert_users`( IN `uName` VARCHAR(255), IN `uEmail` VARCHAR(255), IN `uPassword` VARCHAR(255)) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER BEGIN INSERT INTO users VALUES(null, uName, uEmail,uPassword,now(),now()); END';

        $trigger = 'DROP TRIGGER IF EXISTS update_user;  CREATE TRIGGER `update_user` After update ON `users` FOR EACH ROW INSERT INTO history VALUES(null, New.id,"updated")';

        DB::unprepared($procedure);
        DB::unprepared($insert);
        DB::unprepared($userByID);
        DB::unprepared($trigger);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('get_users_procedure');
    }
}
