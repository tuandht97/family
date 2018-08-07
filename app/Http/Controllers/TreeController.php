<?php

namespace App\Http\Controllers;

use App\Exceptions\TreeNotBelongsToUser;
use App\Http\Requests\TreeRequest;
use App\Http\Resources\NodeResource;
use App\Http\Resources\TreeResource;
use App\Node;
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
        //Lấy danh sách gia phả
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TreeRequest $request)
    {
        $user = Auth::user();
        //dd($user);

        $tree = new Tree;
        $tree->name = $request->name;
        $tree->amount = 1;
        $tree->creator = $user->id;
        // //dd($tree);
        $tree->save();

        //Tạo nút mới với chính
        $node = new Node;
        $node->fullname = $user->fullname;
        $node->email = $user->email;
        $node->phone = $user->phone;
        $node->image = $user->avatar;
        $node->sex = $user->sex;
        $node->birthday = $user->birthday;
        $node->address = $user->address;
        $node->is_alive = true;
        $node->realUser = $user->id;
        $node->idTree = $tree->id;
        $node->level = 1;
        //dd($node);
        $node->save();


        return response([
            'tree' => new TreeResource($tree),
            'node' => new NodeResource($node),
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tree $tree)
    {
        return new TreeResource($tree);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TreeRequest $request, Tree $tree)
    {
        $this->TreeUserCheck($tree);
        $tree->update($request->all());
        return response([
            'data' => new TreeResource($tree)
        ],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tree $tree)
    {
        $this->TreeUserCheck($tree);
        $tree->delete();

        return response()->json([
            'message' => 'Successfully delete tree!'
        ], Response::HTTP_NO_CONTENT);
    }

    public function TreeUserCheck($tree)
    {
        if (Auth::id() !== $tree->creator) {
            throw new TreeNotBelongsToUser();
        }
    }
}
