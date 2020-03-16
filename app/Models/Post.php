<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Post
{
    public string $title;
    public string $body;
    public string $image_id;
    private string $table = 'posts';

    /**
     * @return Collection
     */
    public function all() : Collection
    {
        return DB::table($this->table)
            ->join('images', 'posts.image_id', '=', 'images.id')
            ->select('posts.*', 'images.id', 'images.path')
            ->get();
    }

    /**
     * @param $id
     * @return Model|Builder|object|null
     */
    public function find($id) :?object
    {
        return DB::table($this->table)
            ->join('images', 'posts.image_id', '=', 'images.id')
            ->where('posts.id', $id)
            ->select('posts.*', 'images.path', 'images.id')
            ->first();
    }

    /**
     * @return int
     */
    public function save() : int
    {
        return DB::table($this->table)
            ->insertGetId([
                'title' => $this->title,
                'body' => $this->body,
                'image_id' => $this->image_id,
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
        if ($this->image_id != null) {
            $updateData['picture_id'] = $this->image_id;
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
            ->join('images', 'posts.image_id', '=', 'images.id')
            ->select('posts.*', 'images.path', 'images.id')
            ->orderBy('posts.time', 'desc')
            ->get()->take(3);
    }
}
