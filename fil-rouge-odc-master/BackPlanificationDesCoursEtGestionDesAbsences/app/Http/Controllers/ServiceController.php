<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClasseOuvertResource;
use App\Http\Resources\ModuleResource;
use App\Models\ClasseOuvert;
use App\Models\Module;
use Exception;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function module(){
        try {
            $data = [
                // "module" => Module::with("professeurs")->get(),
                "module" => ModuleResource::collection(Module::all()),
                "classe" => ClasseOuvertResource::collection(ClasseOuvert::all()),
            ];
            return $this->myResponse($data,"les donnees ont été récupérer avec succées", 200);
        } catch (Exception $e) {
            return $this->myResponse($e->getMessage(),"les donnees n'ont pas été récupérer avec succées", 500);

        }
    }
}
