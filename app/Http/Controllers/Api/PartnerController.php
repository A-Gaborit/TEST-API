<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePartnerRequest;
use App\Http\Requests\UpdatePartnerRequest;
use App\Models\Partner;
use App\Models\MemberPartner;

class PartnerController extends Controller
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
    public function store(StorePartnerRequest $request)
    {
        $partner = Partner::create($request->all());

        MemberPartner::create([
            'partner_id' => $partner->id, 
            'user_id' => auth()->user()->id,
            'role' => 'owner',
        ]);

        return $partner;
    }

    public function assignUserToPartner($partnerId)
    {
        MemberPartner::create([
            'partner_id' => $partnerId,
            'user_id' => auth()->user()->id,
        ]);
        return response()->json(['message' => 'Vous avez été ajouté au partenaire avec succès']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePartnerRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
