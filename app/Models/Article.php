<?php


namespace App\Models;


use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Article
{
    public string $title;
    public string $body;
    public string $img;
    private string $table = 'articles';

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
     * @param string $type
     * @return object|null
     */
    public function showArticle(int $id, string $type): ?object
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
