<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class ArticlesController extends Controller
{

    private $data = [];

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Factory|View
     */
    public function showArticle($id)
    {
        $articleModel = new Article();
        $this->data['article'] = $articleModel->showArticle($id);
        $this->data['articles'] = $articleModel->allArticles();
        $this->data['news'] = $articleModel->allNews();

        return view('pages.article', $this->data);
    }

    public function showNews($id)
    {
        $articleModel = new Article();
        $this->data['n'] = $articleModel->showNews($id);
        $this->data['articles'] = $articleModel->allArticles();
        $this->data['news'] = $articleModel->allNews();

        return view('pages.news', $this->data);
    }
}
