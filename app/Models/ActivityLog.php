<?php

namespace App\Models;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ActivityLog
{
    /**
     * @var string
     */
    private $table = 'activity_log';

    /**
     * @param int $userID
     * @param string $activity
     * @return bool
     */
    public function logActivity(int $userID, string $activity): bool
    {
        return DB::table($this->table)
            ->insert([
                "user_id" => $userID,
                "activity" => $activity,
                "date" => date('Y-m-d'),
                "time" => date('H:i:s')
            ]);
    }

    /**
     * @return Collection
     */
    public function getActivity(): Collection
    {
        return DB::table($this->table)
            ->join('users AS u', 'a.user_id', '=', 'u.id_u')
            ->get();
    }

    /**
     * @param string $from
     * @param string $to
     * @return Collection
     */
    public function activityDate(string $from, string $to): Collection
    {
        return DB::table($this->table)
            ->where('date', '>=', $from)
            ->where('date', '<=', $to)
            ->get();
    }

}
