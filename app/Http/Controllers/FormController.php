<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LeadService;

class FormController extends Controller
{
    protected $leadService;

    public function __construct(LeadService $leadService)
    {
        $this->leadService = $leadService;
    }

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

            // Remover caracteres especiais do campo de mensagem
            $message = $request->input('message');
            $cleanMessage = preg_replace('/[^\p{L}\p{N}\s]/u', '', $message);
            $request->merge(['message' => $cleanMessage]);

            $this->leadService->createLead($request->all());

            $request->session()->flash('message', 'Formulário enviado com sucesso!');
            return redirect()->back();
        } catch (\Exception $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }
}
