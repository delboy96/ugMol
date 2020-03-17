<?php

namespace App\Models;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Article
{
    public $title;
    public $body;
    public $img;
    private $table = 'articles';

    /**
     * @return Collection
     */
    public function allArticles(): Collection
    {
        return DB::table($this->table)
            ->where('type', '=', 'članak')
            ->get();
    }

    /**
     * @return Collection
     */
    public function allNews(): Collection
    {
        return DB::table($this->table)
            ->where('type', '=', 'vest')
            ->get();
    }

    /**
     * @param int $id
     * @return object|null
     */
    public function showArticle(int $id): ?object
    {
        return DB::table($this->table)
            ->where([
                ['id', '=', $id],
                ['type', '=', 'članak']
            ])
            ->first();
    }

    /**
     * @param int $id
     * @return object|null
     */
    public function showNews(int $id): ?object
    {
        return DB::table($this->table)
            ->where([
                ['id', '=', $id],
                ['type', '=', 'vest']
            ])
            ->first();
    }
}
