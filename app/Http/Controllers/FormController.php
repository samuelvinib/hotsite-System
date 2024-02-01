<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LeadService;
class FormController extends Controller
{
    protected $leadService;
    public function __construct(LeadService $leadService){
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

        } catch (\Exception $e) {

            return response()->json(['errors' => $e->errors()], 422);
        }

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'message' => 'nullable|string',
        ]);

        $this->leadService->createLead($request->all());

        $request->session()->flash('message', 'Formulário enviado com sucesso!');
        return redirect()->back();
    }
}
