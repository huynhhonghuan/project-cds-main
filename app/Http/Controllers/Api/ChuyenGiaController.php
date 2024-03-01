<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ChuyenGiaResource;
use App\Models\Chuyengia;
use Illuminate\Http\Request;

class ChuyenGiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $chuyenGias = [];
        if ($linhvucid = $request->input('linhvucid')) {
            $chuyenGias = Chuyengia::with(['getUser', 'getLinhVuc'])->where('linhvuc_id', $linhvucid)->get();
        }
        return ChuyenGiaResource::collection($chuyenGias);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
