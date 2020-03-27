<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Roles\CreateRequest;
use App\Http\Requests\Roles\UpdateRequest;
use App\Models\Roles;
use http\Client\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class RolesController extends Controller
{
    private $data = [];

    /**
     * @return Factory|View
     */
    public function index()
    {
        $role = new Roles();
        $this->data['roles'] = $role->all();

        return view('admin.roles', $this->data);
    }

//    /**
//     * Display the specified resource.
//     *
//     * @param int $id
//     * @return Factory|View
//     */
//    public function show($id)
//    {
//        $role = new Roles();
//        $this->data['role'] = $role->show($id);
//
//        return view('pages.single', $this->data);
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('admin.components.Roles.insertForm');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $role = new Roles();
        $this->data['role'] = $role->show($id);

        return view('admin.components.Roles.updateForm', $this->data);
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param $id
     * @return Factory|View
     */
    public function delete($id)
    {
        $role = new Roles();
        $this->data['role'] = $role->show($id);

        return view('admin.components.Roles.deleteForm', $this->data);
    }


    /**
     * @param CreateRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store (CreateRequest $request)
    {
        $role = new Roles();
        $role->name = $request->input('name');
        try {
            $inserted = $role->create();
            if ($inserted) {
                return redirect(route("roles.index"))->with("message", "Uspešno dodata uloga!");
            } else {
                return redirect(route("roles.index"))->with("error", "Desila se greška, uloga nije dodata.");
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
        $role = new Roles();

        $role->name = $request->input('name');
        try {
            $role->update($id);
            return redirect(route("roles.index"))->with("message", "Uspešno izmenjena uloga!");

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
            $role = new Roles();
            if ($role->delete($id)) {
                return redirect(route("roles.index"))->with("message", "Uspešno ste obrisali ulogu!");
            } else {
                return redirect()->back()->with("error", "Došlo je do greške, uloga nije obrisana.");
            }
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with("error", "Došlo je do greške, pokušajte ponovo.");
        }
    }

}
