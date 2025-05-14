<?php

namespace App\Http\Controllers;

use App\Models\Instructeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class InstructeurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Use the stored procedure to get all instructeurs
        $instructeurs = DB::select('CALL sp_getAllInstructeurs()');
        
        return view('instructeur.index', compact('instructeurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('instructeur.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input
        $validator = Validator::make($request->all(), [
            'voornaam' => 'required|string|max:50',
            'tussenvoegsel' => 'nullable|string|max:10',
            'achternaam' => 'required|string|max:50',
            'mobiel' => 'required|string|max:12',
            'datum_in_dienst' => 'required|date',
            'aantal_sterren' => 'required|integer|min:0|max:5',
        ]);

        if ($validator->fails()) {
            return redirect()->route('instructeur.create')
                ->withErrors($validator)
                ->withInput();
        }

        // Call the stored procedure to create a new instructeur
        $result = DB::select('CALL sp_createInstructeur(?, ?, ?, ?, ?, ?)', [
            $request->voornaam,
            $request->tussenvoegsel,
            $request->achternaam,
            $request->mobiel,
            $request->datum_in_dienst,
            $request->aantal_sterren
        ]);

        return redirect()->route('instructeur.index')
            ->with('success', 'Instructeur succesvol toegevoegd');
    }

    /**
     * Display the specified resource.
     */
    public function show(Instructeur $instructeur)
    {
        // Get instructor details
        $instructeurDetails = DB::select('CALL sp_getInstructeurById(?)', [$instructeur->id]);
        
        if (empty($instructeurDetails)) {
            return redirect()->route('instructeur.index')
                ->with('error', 'Instructeur niet gevonden');
        }
        
        $instructeurData = $instructeurDetails[0];
        
        // Get vehicles assigned to this instructor
        $voertuigen = DB::table('voertuigen as v')
            ->join('type_voertuig as tv', 'v.type_voertuig_id', '=', 'tv.id')
            ->join('voertuig_instructeurs as vi', 'v.id', '=', 'vi.voertuig_id')
            ->where('vi.instructeur_id', $instructeur->id)
            ->where('vi.is_actief', 1)
            ->select(
                'tv.type_voertuig',
                'v.type',
                'v.kentkenen',
                'v.bouwjaar',
                'v.brandstof',
                'tv.rijbewijscategorie'
            )
            ->get();

        return view('instructeur.show', compact('instructeurData', 'voertuigen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instructeur $instructeur)
    {
        // Get instructor details using stored procedure
        $instructeurDetails = DB::select('CALL sp_getInstructeurById(?)', [$instructeur->id]);
        
        if (empty($instructeurDetails)) {
            return redirect()->route('instructeur.index')
                ->with('error', 'Instructeur niet gevonden');
        }
        
        $instructeurData = $instructeurDetails[0];
        
        return view('instructeur.edit', compact('instructeurData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instructeur $instructeur)
    {
        // Validate the input
        $validator = Validator::make($request->all(), [
            'voornaam' => 'required|string|max:50',
            'tussenvoegsel' => 'nullable|string|max:10',
            'achternaam' => 'required|string|max:50',
            'mobiel' => 'required|string|max:12',
            'datum_in_dienst' => 'required|date',
            'aantal_sterren' => 'required|integer|min:0|max:5',
        ]);

        if ($validator->fails()) {
            return redirect()->route('instructeur.edit', $instructeur->id)
                ->withErrors($validator)
                ->withInput();
        }

        // Call the stored procedure to update instructeur
        DB::select('CALL sp_updateInstructeur(?, ?, ?, ?, ?, ?, ?)', [
            $instructeur->id,
            $request->voornaam,
            $request->tussenvoegsel,
            $request->achternaam,
            $request->mobiel,
            $request->datum_in_dienst,
            $request->aantal_sterren
        ]);

        return redirect()->route('instructeur.index')
            ->with('success', 'Instructeur succesvol bijgewerkt');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instructeur $instructeur)
    {
        // Call stored procedure to delete instructeur (soft delete)
        DB::select('CALL sp_deleteInstructeur(?)', [$instructeur->id]);

        return redirect()->route('instructeur.index')
            ->with('success', 'Instructeur succesvol verwijderd');
    }
}
