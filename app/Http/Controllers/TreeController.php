<?php

namespace App\Http\Controllers;

use App\Http\Requests\TreeRequest;
use App\Http\Resources\TreeResource;
use App\Tree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TreeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TreeRequest $request)
    {
        $tree = new Tree;
        $tree->name = $request->name;
        $tree->amount = 1;
        $tree->creator = Auth::id();
        //dd($tree);
        //$tree->save();


        return response([
            'data' => new TreeResource($tree)
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
