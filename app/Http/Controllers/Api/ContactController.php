<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store (Request $request) {
        $data = $request->validate([
            "title" => "required|string|max:255",
            "email" => "required|email",
            "message" => "required|string",
            "attachment" => "nullable|file|max:5000",
        ]);

        // salviamo i dati ricevuti dentro una tabella dedicata
        $newContact = Contact::create($data);

        // ritorniamo sempre i dati dell'elemento creato / aggiornato
        return response()->json($newContact);
    }
}
