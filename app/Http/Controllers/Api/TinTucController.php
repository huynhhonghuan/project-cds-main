<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Tintuc as ResourcesTintuc;
use App\Http\Resources\TinTucCollection;
use App\Http\Resources\TinTucResource;
use App\Http\Resources\TinTucResourse;
use App\Models\Linhvuc;
use App\Models\Tintuc;
use Illuminate\Http\Request;

class TinTucController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $tinTucs = [];
        if ($linhvucid = $request->input('linhvucid')) {
            $tinTucs = Tintuc::with(['getLinhvuc', 'getUser'])->where('linhvuc_id', $linhvucid)->orderBy('created_at', 'desc')->get();
        } else if ($tukhoa = $request->input('tukhoa')) {
            $tinTucs = Tintuc::with(['getLinhvuc', 'getUser'])->where('tieuDe', 'LIKE', '%' . $tukhoa . '%')->orderBy('created_at', 'desc')->get();
        }
        return TinTucResource::collection($tinTucs);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tintuc $tintuc)
    {
        //
        return new TinTucResource($tintuc);
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
