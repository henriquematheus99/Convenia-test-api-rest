<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    private $company;

    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    public function index()
    {
        $data = ['data' => $this->company->all()];

        return response()->json($data);
    }

    public function show($id)
    {
        $company = $this->company->find($id);

        if (!$company) {
            return response()->json(['data' => ['msg' => 'Empresa não encontrada.']], 404);
        }

        $data = ['data' => $company];

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
               'name' => 'required|String|max:255',
               'cnpj' => 'required|String',
        ]);
        $this->company->create($data);

        return response()->json(['msg' => 'Empresa cadastrada com sucesso'], 201);
    }

    public function update(Request $request, $id)
    {
        try {
            $companyData = $request->all();
            $company = $this->company->find($id);
            $company->update($companyData);

            $return = ['data' => ['msg' => 'Empresa atualizada com sucesso!']];

            return response()->json($return, 201);
        } catch (\Exception $e) {
            if (\config('app.debug')) {
                return reponse()->json(ApiError::errorMessage($e->getMessage(), 1011));
            }

            return response()->json(ApiError::errorMessage('Houve um erro ao realizar a operação', 1011));
        }
    }

    public function delete(Company $id)
    {
        try {
            $id->delete();

            return response()->json(['data' => ['msg' => 'Empresa: '.$id->name.'removida com sucesso']], 200);
        } catch (\Exception $e) {
            if (\config('app.debug')) {
                return response()->json(ApiError::errorMessage($e->getMessage(), 1012));
            }

            return response() - json(ApiError::errorMessage('Houve um erro ao realizar a operação', 1012));
        }
    }
}
