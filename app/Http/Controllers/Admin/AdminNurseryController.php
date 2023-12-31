<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNurseryRequest;
use App\Http\Requests\UpdateNurseryRequest;
use App\Models\Nursery;
use Illuminate\Support\Facades\Auth;

class AdminNurseryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $nurseries = Nursery::get();
        return view('admin.nursery.index', [
            'nurseries' => $nurseries
        ]);

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
    public function store(StoreNurseryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Nursery $nursery)
    {
        dd('show called');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nursery $nursery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNurseryRequest $request, Nursery $nursery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nursery $nursery)
    {
        //
    }
}
