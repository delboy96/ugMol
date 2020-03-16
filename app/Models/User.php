<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User
{
    public const ADMINISTRATOR = 'Admin';
    public $name;
    public $email;
    public $password;
    private $table = 'users';

    /**
     * @return int
     */
    public function register(): int
    {
        return DB::table($this->table)
            ->insertGetId([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'role_id' => 2,
                'active' => 1,
            ]);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return DB::table($this->table)
            ->join("roles", "user.role_id", "=", "roles.id_r")
            ->select("users.*", "roles.name")
            ->get();
    }

    /**
     * @param int $id
     * @return Model|Builder|object|null
     */
    public function show(int $id): ?object
    {
        return DB::table($this->table)
            ->where("id_u", $id)->first();
    }

    /**
     * @param int $id
     * @return int
     */
    public function delete(int $id): int
    {
        return DB::table($this->table)
            ->delete($id);
    }

    /**
     * @param int $id
     * @return int
     */
    public function update(int $id): int
    {
        return DB::table($this->table)
            ->where("id_u", $id)
            ->update([
                'name' => $this->name,
                'email' => $this->email,
                'password' => md5($this->password),
                'role_id' => 2,
                'active' => 1,
            ]);
    }


    /**
     * @param string $email
     * @return Model|Builder|object|null
     */
    public function getUserByEmail(string $email): ?object
    {
        return DB::table($this->table)
            ->join("roles", "users.role_id", "=", "roles.id_r")
            ->where([
                ['email', '=', $email],
            ])->select("users.*", "roles.name as role")
            ->first();
    }
}
