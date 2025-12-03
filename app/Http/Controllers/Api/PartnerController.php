<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePartnerRequest;
use App\Http\Requests\UpdatePartnerRequest;
use App\Models\Partner;
use App\Models\MemberPartner;
use App\Contracts\Services\PartnerServiceInterface;

class PartnerController extends Controller
{

    /**
     * @param PartnerServiceInterface $partnerService
     */
    public function __construct(
        protected PartnerServiceInterface $partnerService
    ) {}

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
        $partner = $this->partnerService->create($request->validated());
        return response()->json($partner, Response::HTTP_CREATED);
    }

    public function assignUserToPartner(string $partnerId)
    {
        $response = $this->partnerService->assignUserToPartner($partnerId);
        return response()->json($response);
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
