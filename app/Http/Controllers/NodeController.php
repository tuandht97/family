<?php

namespace App\Http\Controllers;

use App\Exceptions\NodeNotBelongsToTree;
use App\Http\Requests\NodeRequest;
use App\Http\Resources\NodeResource;
use App\Node;
use App\Tree;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NodeController extends Controller
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
    public function store(Request $request)
    {
        // $review = new Review($request->all());
        // $product->reviews()->save($review);
        // return response([
        //     'data' => new ReviewResource($review)
        // ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tree $tree, Node $node)
    {
        $this->NodeTreeCheck($tree, $node);
        return new NodeResource($node);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NodeRequest $request,Tree $tree, Node $node)
    {
        $this->NodeTreeCheck($tree, $node);
        $node->update($request->all());
        return response([
            'data' => new NodeResource($node)
        ],Response::HTTP_CREATED);
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

    public function NodeTreeCheck($tree, $node)
    {
        if ($tree->id !== $node->idTree) {
            throw new NodeNotBelongsToTree();
            ;
        }
    }
}
