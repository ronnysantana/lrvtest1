<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teste;

class TesteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = Teste::orderBy('id','desc')->get();
        return $list;
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        /* return [
            'type' => 'create',
            'method' => $request->method(),
            'links' => [
            'self' => 'link',
            ],
        ]; */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Teste::create($request->all())){
            return response()->json(['status' => 'Created', 'type' => 'store', 'nome' => $request->input('nome')], 201);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        /* return [
            'type' => 'show',
            'method' => $request->method(),
            'id' => $id,
            'links' => [
            'self' => 'link',
            ],
        ]; */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        return [
            'type' => 'edit',
            'method' => $request->method(),
            'id' => $id,
            'links' => [
            'self' => 'link',
            ],
        ];
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
        if(Teste::find($id)->update(['nome' => $request->input('nome')])){
            return response()->json(['status' => 'Accepted', 'type' => 'Updated', 'nome' => $request->input('nome'), 'id' => $id], 202);
        } else {
            return response()->json(['status' => 'Expectation Failed', 'type' => 'Updated', 'id' => $id], 417);
        }
        /* return [
            'type' => 'update',
            'method' => $request->method(),
            'id' => $id,
            'links' => [
            'self' => 'link',
            ],
        ]; */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if(Teste::destroy($id)){
            return response()->json(['status' => 'Accepted', 'type' => 'Destroy', 'id' => $id], 202);
        } else {
            return response()->json(['status' => 'Expectation Failed', 'type' => 'Destroy', 'id' => $id], 417);
        }
        /* return [
            'type' => 'destroy',
            'method' => $request->method(),
            'id' => $id,
            'links' => [
            'self' => 'link',
            ],
        ]; */
    }
}
