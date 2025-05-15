<?php

namespace App\Http\Controllers;

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
        $instructeurs = DB::select('CALL sp_getAllInstructeurs()');

        // Ensure 'id' property exists (in case procedure uses instructeur_id)
            foreach ($instructeurs as $instructeur) {
                if (!isset($instructeur->id) && isset($instructeur->instructeur_id)) {
                    $instructeur->id = $instructeur->instructeur_id;
                }
            }


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

        DB::select('CALL sp_createInstructeur(?, ?, ?, ?, ?, ?)', [
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
    public function show($id)
    {
        $instructeurDetails = DB::select('CALL sp_getInstructeurById(?)', [$id]);

        if (empty($instructeurDetails)) {
            return redirect()->route('instructeur.index')
                ->with('error', 'Instructeur niet gevonden');
        }

        $instructeurData = $instructeurDetails[0];

        // Use stored procedure to get vehicles assigned to this instructor
        $voertuigen = DB::select('CALL sp_getVoertuigDetails(?)', [$id]);

        return view('instructeur.show', compact('instructeurData', 'voertuigen', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $instructeurDetails = DB::select('CALL sp_getInstructeurById(?)', [$id]);

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
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'voornaam' => 'required|string|max:50',
            'tussenvoegsel' => 'nullable|string|max:10',
            'achternaam' => 'required|string|max:50',
            'mobiel' => 'required|string|max:12',
            'datum_in_dienst' => 'required|date',
            'aantal_sterren' => 'required|integer|min:0|max:5',
        ]);

        if ($validator->fails()) {
            return redirect()->route('instructeur.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        DB::select('CALL sp_updateInstructeur(?, ?, ?, ?, ?, ?, ?)', [
            $id,
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
    public function destroy($id)
    {
        DB::select('CALL sp_deleteInstructeur(?)', [$id]);

        return redirect()->route('instructeur.index')
            ->with('success', 'Instructeur succesvol verwijderd');
    }
}
