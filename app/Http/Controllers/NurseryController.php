<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNurseryRequest;
use App\Http\Requests\UpdateNurseryRequest;
use App\Models\Nursery;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Scalar\String_;

class NurseryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $nurseries = Nursery::organisation()->select('id', 'name')->get();
        return view('nursery.index', [
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
    }

    /**
     * Display the specified resource.
     */
    public function show(\Request $request, string $id)
    {
        $nursery = Nursery::organisation()
            ->where('id', $id)
            ->firstOrFail();

        return view('nursery.show', [
            'nursery' => $nursery
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(\Request $request, string $id)
    {
        $nursery = Nursery::organisation()
            ->where('id', $id)
            ->firstOrFail();

        return view('nursery.edit', [
            'nursery' => $nursery
        ]);
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
    public function destroy(\Request $request, string $id)
    {
        $nursery = Nursery::organisation()
            ->where('id', $id)
            ->first();

        $nursery->delete();

        return redirect()->route('nursery.index')->with('success', 'Task deleted successfully');
    }
}
