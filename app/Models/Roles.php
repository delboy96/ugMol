<?php

namespace App\Models;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Roles
{
    public const ADMINISTRATOR = 'Admin';
    public $name;
    private $table = 'roles';

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return DB::table($this->table)
            ->oldest('roles.id_r')
            ->get();
    }


    /**
     * @param int $id
     * @return object|null
     */
    public function show(int $id): ?object
    {
        return DB::table($this->table)->where("id_r", $id)->first();
    }

    /**
     * @param int $id
     * @return int
     */
    public function delete(int $id): int
    {
        return DB::table($this->table)
            ->where('id_r', '=', $id)
            ->delete();
    }

    /**
     * @param int $id
     * @return int
     */
    public function update(int $id): int
    {
        return DB::table($this->table)
            ->where("id_r", $id)
            ->update([
                'name' => $this->name,
            ]);
    }

    /**
     * @return int
     */
    public function create(): int
    {

        $updateData = [
            'name' => $this->name
        ];

        return DB::table($this->table)->insertGetId($updateData);
    }


}
