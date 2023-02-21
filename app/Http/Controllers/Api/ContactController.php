<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function store (Request $request) {
        $data = $request->validate([
            "title" => "required|string|max:255",
            "email" => "required|email",
            "message" => "required|string",
            "attachment" => "nullable|file|max:5000",
        ]);

        // se ricevo un allegato, ne salvo il file ed il percorso
        if ($request->has("attachment")) {
            // recupero il path del file appena caricato
            $filePath = Storage::put("/contacts", $data["attachment"]);

            //lo assegno alla chiave attachment
            $data["attachment"] = $filePath;
        }

        // salviamo i dati ricevuti dentro una tabella dedicata
        $newContact = Contact::create($data);

        // ritorniamo sempre i dati dell'elemento creato / aggiornato
        return response()->json($newContact);
    }
}
