<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{

    private $product;

    public function __construct(Empresa $empresa)
    {
        $this->product = $product;
    }

    public function index()
    {
        $data = ['data' => $this->empresa->all()];
        return response()->json($data);
    }

    public function show($id)
    {
        $empresa = $this->empresa->find($id);

        if(! $empresa) return response()->json(['data' => ['msg' => 'Empresa não encontrada.']], 404);

        $data = ['data' => $empresa];    
        return response()->json($data);
    }

    public function store(Request $request)
    {
        try{
        $empresaData = $request->all();
        $this->empresa->create($empresaData);

        return response()->json(['msg' => 'Empresa cadastrada com sucesso'], 201);

        }catch(\Exception $e){
            if(\config('app.debug')){

            }
        }
    }

    public function update(Request $request, $id)
    {
        try{
        $empresaData = $request->all();
        $empresa     = $this->empresa->find($id);
        $empresa->update($empresaData);
        
        return response()->json(['msg' => 'Dados da empresa alterados com sucesso'], 201);

        }catch(\Exception $e){
            if(\config('app.debug')){

            }
        }
    }

    public function delete(Empresa $id)
    {
        try{
           
            $id->delete();
            return response()->json(['data' => ['msg' => 'Empresa: ' . $id->name . 'removida dos registros.']], 200);

    
            }catch(\Exception $e){
                if(\config('app.debug')){
    
                }
            }
    }

}
