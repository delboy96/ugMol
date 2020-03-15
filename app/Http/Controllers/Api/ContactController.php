<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller
{
    /**
     * Slanje mejla adminsitratoru.
     *
     * @param ContactRequest $request
     *
     * @return JsonResponse
     */
    public function send(ContactRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();
            Mail::to(getenv('ADMINISTRATOR_EMAIL'))->send(new ContactMail($data['name'],
                    $data['surname'],
                    $data['email'],
                    $data['message'])
            );
            return response()->json(['message' => 'Upesno poslato.'], Response::HTTP_OK);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'Serverska greska.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
