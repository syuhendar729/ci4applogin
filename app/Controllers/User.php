<?php

namespace App\Controllers;

use Myth\Auth\Models\UserModel;

class User extends BaseController
{
    protected $userModel;
    protected $db;
    protected $builder;

    # =================================================================
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
    }


    public function index()
    {
        $data = [
            'title' => 'My Profile | MyWebsite',
        ];
        return view('user/index', $data);
    }

    public function delete()
    {
        $user = $this->userModel->getUserById(user_id());
        // $this->builder->delete();
        if ($user->user_image != 'default.svg') {
            unlink('img/' . $user->user_image);
        }
        $this->builder->select()->where('users.id', user_id())->delete();
        return redirect()->to('/logout');
    }

    public function edit()
    {
        $data = [
            'user'  => $this->userModel->getUserById(user_id()),
            'title' => 'Edit Profile | MyWebsite',
        ];
        session()->setFlashData('pesanEdit', 'This feature is coming soon, see you next time :)');
        session()->setFlashData('alert', 'warning');
        return view('user/edit', $data);
    }
}
