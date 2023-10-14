<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSessionDeCoursRequest;
use App\Http\Resources\SessionDeCoursResource;
use App\Models\SessionDeCours;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SessionDeCoursController extends Controller
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
    public function store(CreateSessionDeCoursRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = SessionDeCours::createSessions($request);
            DB::commit();
            return $this->myResponse(new SessionDeCoursResource($data), "La session a été crée avec succes ...",200);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->myResponse($e->getMessage(), "La session n'a pas été crée inserées ...",500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SessionDeCours $sessionDeCours)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SessionDeCours $sessionDeCours)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SessionDeCours $sessionDeCours)
    {
        //
    }
}
