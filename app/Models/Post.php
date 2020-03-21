<?php

namespace App\Models;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;


class Post
{
    public $title;
    public $subtitle;
    public $body;
    public $citat;
    public $datum;
    public $img_path;
    private $table = 'posts';

    /**
     * @return Paginator
     */
    public function all(): Paginator
    {
        return DB::table($this->table)->paginate(6, ['*'], 'page');
//            ->join('images', 'posts.image_id', '=', 'images.id')
    }


    /**
     * @param $id
     * @return Model|Builder|object|null
     */
    public function find($id): ?object
    {
        return DB::table($this->table)
//            ->join('images', 'posts.image_id', '=', 'images.id')
            ->where('posts.id', $id)
//            ->select('posts.*', 'images.path', 'images.id')
            ->first();
    }

    //where za search

    /**
     * @param string $search
     * @return Model|Builder|object|null|Collection
     */
    public function where(string $search )
    {
        return DB::table($this->table)
            ->where( 'title', 'LIKE' , '%' . $search . '%')
            ->orWhere ( 'subtitle', 'LIKE', '%' . $search . '%' )
            ->orWhere ( 'citat', 'LIKE', '%' . $search . '%' )
            ->orWhere ( 'body', 'LIKE', '%' . $search . '%' )
            ->get();
    }

    /**
     * @param $title
     * @param $subtitle
     * @param $body
     * @param $citat
     * @param $img_path
     * @return int
     */
    public function create($title, $subtitle, $body, $citat, $datum, $img_path): int
    {

        $insertData = [
            'title' => $title,
            'subtitle' => $subtitle,
            'body' => $body,
            'citat' => $citat,
            'datum' => $datum,
        ];

        if ($img_path != null) {
            $insertData['img_path'] = $img_path;
        }

        return DB::table($this->table)
            ->insertGetId($insertData);
    }

    /**
     * @param int $id
     * @return int
     */
    public function update(int $id): int
    {
        $updateData = [
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'body' => $this->body,
            'citat' => $this->citat,
            'datum' => $this->datum,
        ];

        if ($this->img_path != null) {
            $updateData['img_path'] = $this->img_path;
        }
        return DB::table($this->table)
            ->where('id', $id)
            ->update($updateData);
    }

    /**
     * @param int $id
     * @return int
     */
    public function delete(int $id): int
    {
        return DB::table($this->table)->delete($id);
    }

    /**
     * @return Collection
     */
    public function latest(): Collection
    {
        return DB::table($this->table)
//            ->join('images', 'posts.image_id', '=', 'images.id')
//            ->select('posts.*', 'images.path', 'images.id')
            ->latest('posts.datum')
            ->get()->take(3);
    }
}
