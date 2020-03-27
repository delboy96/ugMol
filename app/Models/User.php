<?php


namespace App\Models;


use Illuminate\Contracts\Pagination\LengthAwarePaginator;
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
    public $role_id;
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
                'role_id' => $this->role_id ?? '2',
                'active' => 1,
            ]);
    }

    /**
     * @return LengthAwarePaginator
     */
    public function all(): LengthAwarePaginator
    {
        return DB::table($this->table)
            ->join("roles", "Users.role_id", "=", "roles.id_r")
            ->select("Users.*", "roles.name as role")
            ->paginate(10, ['*'], 'page');
    }

    /**
     * @param int $id
     * @return Model|Builder|object|null
     */
    public function show(int $id): ?object
    {
        return DB::table($this->table)
            ->join("roles", "Users.role_id", "=", "roles.id_r")
            ->select("Users.*", "roles.name as role", "roles.id_r as idR")
            ->where("id_u", $id)->first();
    }

    /**
     * @param int $id
     * @return int
     */
    public function delete(int $id): int
    {
        return DB::table($this->table)
            ->where('id_u', '=', $id)
            ->delete();
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
                'password' => Hash::make($this->password),
                'role_id' => $this->role_id ?? '2',
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
            ->join("roles", "Users.role_id", "=", "roles.id_r")
            ->where([
                ['email', '=', $email],
            ])->select("Users.*", "roles.name as role")
            ->first();
    }
}
