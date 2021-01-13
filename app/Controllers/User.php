<?php namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {

        $data = [
            'title' => 'My Profile | MyWebsite',
        ];
        return view('user/index', $data);
    }

}
