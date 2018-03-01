<?php

namespace App\Http\Controllers;


class ContractorController extends Controller
{
    public function ContractorList()
    {
        $contractorList['name'] = 'Rajat Verma';
        $contractorList['profile'] = 'Laravel Developer';
        $contractorList['organisation'] = 'Vinove Overseas';
        
        dd(json_encode($contractorList));
    }
}
