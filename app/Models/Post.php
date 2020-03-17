<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Post
{
    public  $title;
    public  $body;
    public  $img_path;
    private  $table = 'posts';

    /**
     * @return Collection
     */
    public function all() : Collection
    {
        return DB::table($this->table)
//            ->join('images', 'posts.image_id', '=', 'images.id')
            ->get();
    }

    /**
     * @param $id
     * @return Model|Builder|object|null
     */
    public function find($id) :?object
    {
        return DB::table($this->table)
//            ->join('images', 'posts.image_id', '=', 'images.id')
            ->where('posts.id', $id)
//            ->select('posts.*', 'images.path', 'images.id')
            ->first();
    }

    /**
     * @return int
     */
    public function create() : int
    {
        return DB::table($this->table)
            ->insertGetId([
                'title' => $this->title,
                'body' => $this->body,
                'img_path' => $this->img_path,
            ]);
    }

    /**
     * @param $id
     * @return int
     */
    public function update($id) : int
    {
        $updateData = [
            'title' => $this->title,
            'body' => $this->body,
//            'updated_at' => date("Y-m-d H:i:s")
        ];
        if ($this->img_path != null) {
            $updateData['img_path'] = $this->img_path;
        }
        return DB::table($this->table)
            ->where('id', $id)
            ->update($updateData);
    }

    /**
     * @param $id
     * @return int
     */
    public function delete($id) : int
    {
        return DB::table($this->table)
            ->delete($id);
    }

    /**
     * @return Collection
     */
    public function latest() : Collection
    {
        return DB::table($this->table)
//            ->join('images', 'posts.image_id', '=', 'images.id')
//            ->select('posts.*', 'images.path', 'images.id')
            ->orderBy('posts.time', 'desc')
            ->get()->take(3);
    }
}
