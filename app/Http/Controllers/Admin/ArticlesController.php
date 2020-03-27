<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticlesNews\CreateRequest;
use App\Http\Requests\ArticlesNews\UpdateRequest;
use App\Models\Article;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class ArticlesController extends Controller
{

    private $data = [];

    public function indexArticle()
    {
        $article = new Article();
        $this->data['articles'] = $article->allArticles();

        return view('admin.articles', $this->data);
    }

    public function indexNews()
    {
        $article = new Article();
        $this->data['news'] = $article->allNews();

        return view('admin.news', $this->data);
    }


//    public function showArticle($id)
//    {
//        $article= new Article();
//        $this->data['article'] = $article->showArticle($id);
//        $this->data['articles'] = $article->allArticles();
//        $this->data['news'] = $article->allNews();
//
//        return view('pages.article', $this->data);
//    }
//
//    public function showNews($id)
//    {
//        $article = new Article();
//        $this->data['n'] = $article->showNews($id);
//        $this->data['articles'] = $article->allArticles();
//        $this->data['news'] = $article->allNews();
//
//        return view('pages.news', $this->data);
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function createArticle()
    {
        return view('admin.components.Articles.insertForm');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function createNews()
    {
        return view('admin.components.News.insertForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return RedirectResponse|Redirector
     */
    public function storeArticle(CreateRequest $request)
    {
        $article = new Article();

        if ($request->hasFile('img')) {
            // Upload slike
            $file = $request->file('img');
            $directory = public_path("assets/img/articles/");
            $fileName = time() . "_" . $file->getClientOriginalName();
            $file->move($directory, $fileName);
            $article->img = "assets/img/articles/" . $fileName;
        }

        $article->title = $request->input('title');
        $article->body = $request->input('body');
        try {
            if ($article->createArticle()) {
                return redirect(route("articles.index"))->with("message", "Uspešno dodat članak!");
            } else {
                return redirect()->back()->with("error", "Desila se greška, članak nije dodat.");
            }
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with("error", "Desila se greška, pokušajte ponovo.");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return RedirectResponse|Redirector
     */
    public function storeNews(CreateRequest $request)
    {
        $article = new Article();

        if ($request->hasFile('img')) {
            // Upload slike
            $file = $request->file('img');
            $directory = public_path("assets/img/news/");
            $fileName = time() . "_" . $file->getClientOriginalName();
            $file->move($directory, $fileName);
            $article->img = "assets/img/news/" . $fileName;
        }

        $article->title = $request->input('title');
        $article->body = $request->input('body');
        try {
            if ($article->createNews()) {
                return redirect(route("news.index"))->with("message", "Uspešno dodata vest!");
            } else {
                return redirect()->back()->with("error", "Desila se greška, vest nije dodata.");
            }
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with("error", "Desila se greška, pokušajte ponovo.");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Factory|View
     */
    public function editArticle($id)
    {
        $article = new Article();
        $this->data['article'] = $article->showArticle($id);

        return view('admin.components.Articles.updateForm', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Factory|View
     */
    public function editNews($id)
    {
        $article = new Article();
        $this->data['new'] = $article->showNews($id);

        return view('admin.components.News.updateForm', $this->data);
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param $id
     * @return Factory|View
     */
    public function deleteArticle($id)
    {
        $article = new Article();
        $this->data['article'] = $article->showArticle($id);

        return view('admin.components.Articles.deleteForm', $this->data);
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param $id
     * @return Factory|View
     */
    public function deleteNews($id)
    {
        $article = new Article();
        $this->data['new'] = $article->showNews($id);

        return view('admin.components.News.deleteForm', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param int $id
     * @return RedirectResponse|Redirector
     */
    public function updateArticle(UpdateRequest $request, $id)
    {
        $article = new Article();

        if ($request->hasFile('img')) {
            // Upload slike
            $file = $request->file('img');
            $directory = public_path("assets/img/articles/");
            $fileName = time() . "_" . $file->getClientOriginalName();
            $file->move($directory, $fileName);
            $article->img = "assets/img/articles/" . $fileName;
        }

        $article->title = $request->input('title');
        $article->body = $request->input('body');
        try {
            $article->updateArticle($id);

            return redirect(route("articles.index"))->with("message", "Uspešno izmenjen članak!");
        } catch (QueryException $e) {
//            Log::error($e->getMessage());
            return redirect()->back()->with("error", "Desila se greška, članak nije izmenjen.");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param int $id
     * @return RedirectResponse|Redirector
     */
    public function updateNews(UpdateRequest $request, $id)
    {
        $article = new Article();

        if ($request->hasFile('img')) {
            // Upload slike
            $file = $request->file('img');
            $directory = public_path("assets/img/news/");
            $fileName = time() . "_" . $file->getClientOriginalName();
            $file->move($directory, $fileName);
            $article->img = "assets/img/news/" . $fileName;
        }

        $article->title = $request->input('title');
        $article->body = $request->input('body');
        try {
            $article->updateNews($id);

            return redirect(route("news.index"))->with("message", "Uspešno izmenjena vest!");
        } catch (QueryException $e) {
//            Log::error($e->getMessage());
            return redirect()->back()->with("error", "Desila se greška, vest nije izmenjena.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroyArticle($id)
    {
        try {
            $article = new Article();
            if ($article->deleteArticle($id)) {
                return redirect(route("articles.index"))->with("message", "Uspešno ste obrisali članak!");
            } else {
                return redirect()->back()->with("error", "Došlo je do greške, članak nije obrisan.");
            }
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with("error", "Došlo je do greške, pokušajte ponovo.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroyNews($id)
    {
        try {
            $article = new Article();
            if ($article->deleteNews($id)) {
                return redirect(route("news.index"))->with("message", "Uspešno ste obrisali vest!");
            } else {
                return redirect()->back()->with("error", "Došlo je do greške, vest nije obrisana.");
            }
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with("error", "Došlo je do greške, pokušajte ponovo.");
        }
    }
}
