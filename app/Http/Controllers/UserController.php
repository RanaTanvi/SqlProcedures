<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepo;

    public function __construct() 
    {

    }
    /**
     * Insert User data 
    */

    public function save() 
    {   
        $insertUSer = DB::select('call insert_user(?,?,?)',
                                  array("name", "name@gmail.com")
        );

    }
}
