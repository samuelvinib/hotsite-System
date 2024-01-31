<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'tel' => 'nullable|string|max:20',
                'state' => 'nullable|string|max:255',
                'city' => 'nullable|string|max:255',
                'message' => 'nullable|string',
            ]);

        } catch (\Exception $e) {

            return response()->json(['errors' => $e->errors()], 422);
        }


        $name = $request->input('name');
        $email = $request->input('email');
        $tel = $request->input('tel');
        $estado = $request->input('estado');
        $cidade = $request->input('cidade');
        $mensagem = $request->input('mensagem');

        return $request;
    }
}
