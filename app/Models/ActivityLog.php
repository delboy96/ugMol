<?php

namespace App\Models;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
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
                "date" => now()
            ]);
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getActivity(): LengthAwarePaginator
    {
        return DB::table($this->table)
            ->paginate('10', ['*'],'page');
    }

    /**
     * @param string $from
     * @param string $to
     * @return LengthAwarePaginator|Collection
     */
    public function activityDate(string $from, string $to)
    {
        return DB::table($this->table)
            ->where('date', '>=', $from)
            ->where('date', '<=', $to)
            ->paginate('10', ['*'],'page');
    }

}
