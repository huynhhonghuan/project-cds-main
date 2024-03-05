<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MucDoResource;
use App\Models\Mucdo;
use Illuminate\Http\Request;

class MucDoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mucDos = Mucdo::all();
        return MucDoResource::collection($mucDos);
    }
}
