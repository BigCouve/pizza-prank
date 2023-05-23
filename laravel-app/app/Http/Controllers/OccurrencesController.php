<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Occurrence;
use Illuminati\Support\Facades\Session;

class OccurrencesController extends Controller
{
    public function store(Request $request)
    {
        // continuar criando os dados secundarios das ocorrências de pizza/refri, parei em criar o registro da foto no DB e falta salvar localmente;
        $occurrenceGalery = OcurrenceGalery::create(['name' => $request->file->name]);
        $occurrence = Occurrence::create([
            'users_id' => $request->user()->id,
        ]);
    }
}
