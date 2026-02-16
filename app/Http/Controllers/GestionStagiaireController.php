<?php

namespace App\Http\Controllers;

use App\Models\gestionStagiaire;
use App\Http\Requests\StoregestionStagiaireRequest;
use App\Http\Requests\UpdategestionStagiaireRequest;
use Illuminate\Database\Eloquent\Factories\Factory;
class GestionStagiaireController extends Controller
{
    public function gestionnaire(){
        gestionStagiaire::factory()->count(10)->create();
        return '10 users';
    }
    public function index()
    {
        $gestionnaires = gestionStagiaire::all();
       return view('gestionnaires.index', compact('gestionnaires'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoregestionStagiaireRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(gestionStagiaire $gestionStagiaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(gestionStagiaire $gestionStagiaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdategestionStagiaireRequest $request, gestionStagiaire $gestionStagiaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(gestionStagiaire $gestionStagiaire)
    {
        //
    }
}
