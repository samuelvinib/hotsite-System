<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Services\LeadService;

class LeadController extends Controller
{
    private $leadModel;
    protected $leadService;
    public function __construct()
    {
        $this->leadModel = new Lead();
        $this->leadService = new LeadService();
    }

    public function index()
    {
        $leads = $this->leadModel::all();
        return $leads->toArray();
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

    public function update(Request $request, $id)
    {
        $lead = $this->leadModel::findOrFail($id);
        $lead->update([
            "answered" => true
        ]);
        $request->session()->flash('message', 'Lead alterado com sucesso!');
        return redirect()->back();
    }

    public function destroy(Request $request, $id)
    {
        $lead = $this->leadModel::findOrFail($id);
        $lead->delete();
        $request->session()->flash('message', 'Lead excluido com sucesso!');
        return redirect()->back();
    }
}
