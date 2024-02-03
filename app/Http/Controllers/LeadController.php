<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;

class LeadController extends Controller
{
    private $leadModel;
    public function __construct()
    {
        $this->leadModel = new Lead();
    }

    public function index()
    {
        $leads = $this->leadModel::all();
        return $leads->toArray();
    }

    public function update(Request $request, $id)
    {
        $lead = $this->leadModel::findOrFail($id);
        $lead->update([
            "answered"=>true
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
