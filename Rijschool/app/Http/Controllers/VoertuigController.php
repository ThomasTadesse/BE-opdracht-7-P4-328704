<?php

namespace App\Http\Controllers;

use App\Models\Voertuig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VoertuigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $voertuigen = DB::select('CALL sp_getAllAvailableVoertuigen()');
        return view('voertuig.index', compact('voertuigen'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Voertuig $voertuig)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Get vehicle details
        $voertuig = DB::select('CALL sp_getVoertuigDetails(?)', [$id])[0] ?? null;
        
        if (!$voertuig) {
            return redirect()->route('voertuig.index')->with('error', 'Voertuig niet gevonden');
        }
        
        // Get all instructeurs for dropdown
        $instructeurs = DB::select('CALL sp_getAllInstructeurs()');
        
        // Get type voertuigen for dropdown
        $typeVoertuigen = DB::table('TypeVoertuig')->where('is_actief', 1)->get();
        
        // Get current instructeur if assigned
        $currentInstructeur = DB::table('VoertuigInstructeurs')
            ->where('voertuig_id', $id)
            ->where('is_actief', 1)
            ->first();
            
        return view('voertuig.edit', compact('voertuig', 'instructeurs', 'typeVoertuigen', 'currentInstructeur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'type_voertuig_id' => 'required|exists:TypeVoertuig,id',
            'instructeur_id' => 'required|exists:Instructeurs,id',
            'type' => 'required|string|max:20',
            'bouwjaar' => 'required|date',
            'brandstof' => 'required|string|max:20',
            'kenteken' => 'required|string|max:8',
        ]);
        
        // Call stored procedure to update vehicle and assign to instructor
        DB::select('CALL sp_updateVoertuig(?, ?, ?, ?, ?, ?, ?)', [
            $id,
            $request->instructeur_id,
            $request->type_voertuig_id,
            $request->type,
            $request->bouwjaar,
            $request->brandstof,
            $request->kenteken
        ]);
        
        return redirect()->route('voertuig.index')
            ->with('success', 'Voertuig is bijgewerkt en toegewezen aan instructeur');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voertuig $voertuig)
    {
        //
    }
}
