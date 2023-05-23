<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Occurrence;
use App\Models\User;
use App\Models\Consumable;
use App\Models\OccurrenceGalery;
use Illuminati\Support\Facades\Session;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Carbon\Carbon;


class OccurrencesController extends Controller
{
    public function store(Request $request)
    {
        // continuar criando os dados secundarios das ocorrências de pizza/refri, parei em criar o registro da foto no DB e falta salvar localmente;       
        $this->storeMain($request);
        
    }
    public function storeMain($request){
        $fileName = $this->saveFileName($request);
        $this->saveFile($request, $fileName->name);
        $this->definePenitence($request, $fileName->id);
    }
    
    public function saveFileName($request){
        $fileName = OccurrenceGalery::create([
            'name' => rand() . '.' . $request->file->getClientOriginalExtension(),
        ]);
        return $fileName;
    }

    public function saveFile($request, $fileName){
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = 'images/occurrences/' . $fileName;
            $file->move('images/occurrences/', $fileName);
        }
    }
    
    public function definePenitence($request, $fileId){
        $pizzaId = Consumable::where('name', 'pizza')->first()->id;
        $sodaId = Consumable::where('name', 'soda')->first()->id;
        if (Occurrence::where('users_id', $request->user()->id)->count() > 3) {
            $data = [
                [
                    'users_id' => $request->user()->id, 
                    'occurrences_galery_id' => $fileId,
                    'consumables_id' => $pizzaId
                ],
                [
                    'users_id' => $request->user()->id, 
                    //'occurrences_galery_id' => $fileId,
                    'consumables_id' => $sodaId
                ],
            ];
    
            foreach ($data as $record) {
                Occurrence::create($record);
            }
        } else {
            $occurrence = Occurrence::create([
                'users_id' => $request->user()->id,
                'occurrences_galery_id' => $fileId,
                'consumables_id' => $pizzaId
            ]);
        }
    }
}
