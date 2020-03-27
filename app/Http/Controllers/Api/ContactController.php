<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use ErrorException;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\{Log, Mail};

class ContactController extends Controller
{

    /**
     * @param ContactRequest $request
     *
     * @return RedirectResponse
     */
    public function send(ContactRequest $request): RedirectResponse
    {
        try {
            $data = $request->validated();
            Mail::to(getenv('ADMINISTRATOR_EMAIL'))->send(
                new ContactMail(
                    $data['name'],
                    $data['surname'],
                    $data['email'],
                    $data['body']
                )
            );
            return redirect()->back()->with(['message' => 'Uspešno poslato.']);
        } catch (ErrorException $exception) {
            dd($exception);
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with(['error' => 'Serverska greška.']);
        }
    }
}
