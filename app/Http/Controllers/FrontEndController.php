<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class FrontEndController extends Controller
{
    private $data = [];

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $postModel = new Post();
        $articleModel = new Article();
        $this->data['posts'] = $postModel->all();
        $this->data['slider'] = $postModel->latest();
        $this->data['articles'] = $articleModel->latestArticles();
        $this->data['news'] = $articleModel->latestNews();

//        $Users->links('pages.index');

        return view('pages.index', $this->data);
    }

    /**
     * Search
     *
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function search(Request $request)
    {
        $search = $request->input('search', null);
        $model = new Post();
        if ($search != null) {
            $post = $model->where($search);
            if (count($post) > 0) {
                return view('pages.search')->withDetails($post)->withQuery($search);
            } else {
                return view('pages.search')->withMessage('Nijedan događaj nije pronađen. Pokušajte pretragu ponovo!');
            }
        }

        return redirect(route('index'));
    }

    /**
     * @return View
     */
    public function contactForm(): View
    {
        return view('pages.contact');
    }

    /**
     * @return Factory|View
     */
    public function about(): View
    {
        return view('pages.about');
    }

    /**
     * @return Factory|View
     */
    public function loginForm(): View
    {
        return view('pages.loginForm');
    }

    /**
     * @return Factory|View
     */
    public function registerForm(): View
    {
        return view('pages.regForm');
    }

}
