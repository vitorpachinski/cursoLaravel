<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Supplier;

class FornecedorController extends Controller
{
    public function index()
    {
        // $fornecedores = session()->get('fornecedores');
        // $message = isset($fornecedores) ? null : 'Nenhum fornecedor cadastrado';
        // $title = 'Area administrativa - Fornecedores';
        return view('app.suppliers.index', ['title' => 'Area Administrativa | Fornecedores']);
    }
    // public function store(Request $request){
    //     $fornecedores = session()->get('fornecedores', []);
    //     $fornecedores[] = $request->all();
    //     session()->put('fornecedores', $fornecedores);
    //     return redirect()->route('app.fornecedores');
    // }
    public function list()
    {
        return view('app.suppliers.list', ['title' => 'Lista de fornecedores']);
    }
    public function new()
    {
        return view('app.suppliers.add', ['title' => 'Cadastrar fornecedor']);
    }
    public function add(Request $request)
    {
        if ($request->input('_token') != '') {
            $rules = [
                'name' => 'required | max:50 | min:3',
                'site' => 'max:255',
                'country' => 'required | max:2 | min:2',
                'email' => 'required | email |'
            ];
            $feedbacks = [
                'required' => 'O campo :attribute é obrigatório',
                'name.max' => 'O nome deve ter no máximo 50 caracteres',
                'name.min' => 'O nome deve ter no mínimo 3 caracteres',
                'site.max' => 'O site deve ter no máximo 255 caracteres',
                'email.email' => 'O e-mail deve ser um endereço válido',
                'email.unique' => 'Este e-mail já está cadastrado',
                'country.max' => 'O país deve ter 2 caracteres',
                'country.min' => 'O país deve ter 2 caracteres'
            ];
            $request->validate($rules, $feedbacks);
            $fornecedor = new Supplier;
            $fornecedor->create($request->all());
            $message = "Cadastro realizado com sucesso";
        }
        return view('app.suppliers.add', ['title'=>'Cadastrar fornecedor','message' => $message]);
    }
}
