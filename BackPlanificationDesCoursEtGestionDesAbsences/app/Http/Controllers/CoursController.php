<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequestModule;
use App\Models\Cours;
use App\Models\ProfModule;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequestModule $request)
    {
        try {
            DB::beginTransaction();
            $data = Cours::created($request->all());
            DB::commit();
            return $this->myResponse($data, "Les données ont été inserées avec succes ...",200);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->myResponse($e->getMessage(), "Les données n'ont pas été inserées ...",500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cours $cours)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cours $cours)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cours $cours)
    {
        //
    }
}
