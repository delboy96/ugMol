<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\UpdateRequest;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class UsersController extends Controller
{
    private $data = [];

    /**
     * @return Factory|View
     */
    public function index()
    {
        $article = new User();
        $this->data['users'] = $article->all();

        return view('admin.components.Users.index', $this->data);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Factory|View
     */
    public function show($id)
    {
        $user = new User();
        $this->data['user'] = $user->show($id);

        return view('pages.single', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $roles= new Roles();
        $this->data['roles'] = $roles->all();

        return view('admin.components.Users.insertForm', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $user = new User();
        $this->data['user'] = $user->show($id);
        $roles= new Roles();
        $this->data['roles'] = $roles->all();

        return view('admin.components.Users.updateForm', $this->data);
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param $id
     * @return Factory|View
     */
    public function delete($id)
    {
        $user = new User();
        $this->data['user'] = $user->show($id);

        return view('admin.components.Users.deleteForm', $this->data);
    }

    /**
     * @param RegisterRequest $request
     * @return RedirectResponse
     */
    public function store (RegisterRequest $request): RedirectResponse
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input("password");
        $user->role_id = $request->input("role_id");

        try {
            $inserted = $user->register();
            if ($inserted) {
                return redirect(route("users.index"))->with("message", "Uspešno dodat korisnik!");
            } else {
                return redirect()->back()->with("error", "Desila se greška, korisnik nije dodat.");
            }
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with("error", "Serverska greška.");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param int $id
     * @return RedirectResponse|Redirector
     */
    public function update(UpdateRequest $request, $id)
    {
        $user = new User();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input("password");
        $user->role_id = $request->input("role_id");
        try {
            $user->update($id);
            return redirect(route("users.index"))->with("message", "Uspešno izmenjen korisnik!");

        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with("error", "Desila se greška, pokušajte ponovo.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $user = new User();
            if ($user->delete($id)) {
                return redirect(route("users.index"))->with("message", "Uspešno ste obrisali korisnika!");
            } else {
                return redirect()->back()->with("error", "Došlo je do greške, korisnik nije obrisan.");
            }
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with("error", "Došlo je do greške, pokušajte ponovo.");
        }
    }
}
