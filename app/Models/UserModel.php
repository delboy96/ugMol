<?php


namespace App\Models;


use Illuminate\Support\Facades\DB;

class UserModel
{
    public $name;
    public $email;
    public $password;

    public function register()
    {
        return DB::table('users')
            ->insertGetId([
                'name' => $this->name,
                'email' => $this->email,
                'password' => md5($this->password),
                'role_id' => 2,
                'active' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s")
            ]);
    }

    public function all()
    {
        return DB::table('users')
            ->join("roles", "user.role_id", "=", "roles.id_r")
            ->select("users.*", "roles.name")
            ->get();
    }

    public function show($id)
    {
        return DB::table('users')
            ->where("id_u", $id)->first();
    }

    public function delete($id)
    {
        return DB::table('users')
            ->delete($id);
    }

    public function update($id)
    {
        return DB::table('users')
            ->where("id_u", $id)
            ->update([
                'name' => $this->name,
                'email' => $this->email,
                'password' => md5($this->password),
                'role_id' => 2,
                'active' => 1,
            ]);
    }

    public function login()
    {
        return DB::table('users')
            ->join("roles", "users.role_id", "=", "roles.id_r")
            ->where([
                ['email', '=', $this->email],
                ['password', '=', md5($this->password)]
            ])->select("users.*", "roles.name as role")
            ->get()->first();
    }
}
