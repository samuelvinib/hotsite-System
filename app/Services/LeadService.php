<?php

namespace App\Services;

use App\Models\Lead;

class LeadService
{
    public function createLead(array $data)
    {
        return Lead::create($data);
    }

}
