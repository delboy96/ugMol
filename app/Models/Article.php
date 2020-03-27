<?php

namespace App\Models;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use PhpParser\Builder;

class Article
{
    public const DEFAULT_POST_IMAGE = 'assets/img/vest.JPG';

    public $title;
    public $body;
    public $img;
    public $date;
    private $table = 'articles';

    /**
     * @return LengthAwarePaginator
     */
    public function allArticles(): LengthAwarePaginator
    {
        return DB::table($this->table)
            ->where('type', '=', 'članak')
            ->paginate(6, ['*'], 'page');
    }

    /**
     * @return LengthAwarePaginator
     */
    public function allNews(): LengthAwarePaginator
    {
        return DB::table($this->table)
            ->where('type', '=', 'vest')
            ->paginate(6, ['*'], 'page');
    }

    /**
     * @return Collection
     */
    public function latestArticles()
    {
        return DB::table($this->table)
            ->where('type', '=', 'članak')
            ->latest('date')
            ->get()->take(5);
    }

    /**
     * @return Collection
     */
    public function latestNews()
    {
        return DB::table($this->table)
            ->where('type', '=', 'vest')
            ->latest('date')
            ->get()->take(5);
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

//    /**
//     * @param $id
//     * @return Model|Builder|object|null
//     */
//    public function findArticle($id): ?object
//    {
//        return DB::table($this->table)
////            ->join('images', 'posts.image_id', '=', 'images.id')
//            ->where([
//                ['id', '=', $id],
//                ['type', '=', 'članak']
//            ])
////            ->select('posts.*', 'images.path', 'images.id')
//            ->first();
//    }

    //where za search

    /**
     * @param string $search
     * @return Model|Builder|object|null|Collection
     */
    public function whereArticles(string $search)
    {
        return DB::table($this->table)
            ->where(['title', 'LIKE', '%' . $search . '%'],
                ['type', '=', 'članak'])
            ->orWhere(['body', 'LIKE', '%' . $search . '%'],
                ['type', '=', 'članak'])
            ->get();
    }

    /**
     * @param string $search
     * @return Model|Builder|object|null|Collection
     */
    public function whereNews(string $search)
    {
        return DB::table($this->table)
            ->where(['title', 'LIKE', '%' . $search . '%'],
                ['type', '=', 'vest'])
            ->orWhere(['body', 'LIKE', '%' . $search . '%'],
                ['type', '=', 'vest'])
            ->get();
    }

    /**
 * @return int
 */
    public function createArticle(): int
    {
        $updateData = [
            'title' => $this->title,
            'body' => $this->body,
            'date' => now(),
            'img' => $this->img ?? self::DEFAULT_POST_IMAGE,
            'type' => 'članak'
        ];

        return DB::table($this->table)->insertGetId($updateData);
    }

    /**
     * @return int
     */
    public function createNews(): int
    {
        $updateData = [
            'title' => $this->title,
            'body' => $this->body,
            'date' => now(),
            'img' => $this->img ?? self::DEFAULT_POST_IMAGE,
            'type' => 'vest'
        ];

        return DB::table($this->table)->insertGetId($updateData);
    }

    /**
 * @param int $id
 * @return int
 */
    public function updateArticle(int $id): int
    {
        $updateData = [
            'title' => $this->title,
            'body' => $this->body,
            'date' => now(),
            'img' => $this->img ?? self::DEFAULT_POST_IMAGE
        ];

        return DB::table($this->table)
            ->where([
                ['id', '=', $id],
                ['type', '=', 'članak']
            ])
            ->update($updateData);
    }

    /**
     * @param int $id
     * @return int
     */
    public function updateNews(int $id): int
    {
        $updateData = [
            'title' => $this->title,
            'body' => $this->body,
            'date' => now(),
            'img' => $this->img ?? self::DEFAULT_POST_IMAGE
        ];

        return DB::table($this->table)
            ->where([
                ['id', '=', $id],
                ['type', '=', 'vest']
            ])
            ->update($updateData);
    }

    /**
     * @param int $id
     * @return int
     */
    public function deleteArticle(int $id): int
    {
        return DB::table($this->table)->delete($id);
    }

    /**
     * @param int $id
     * @return int
     */
    public function deleteNews(int $id): int
    {
        return DB::table($this->table)->delete($id);
    }

    /**
     * @return int
     */
    public function totalArticles()
    {
        return DB::table($this->table)
            ->where('type', '=', 'članak')
            ->count();
    }

    /**
     * @return int
     */
    public function totalNews()
    {
        return DB::table($this->table)
            ->where('type', '=', 'vest')
            ->count();
    }



}
