<?php

namespace App\Http\Controllers;


class ContractorController extends Controller
{
    public function ContractorList()
    {
        $contractorList['name'] = 'Rajat Verma';
        $contractorList['profile'] = 'Laravel Developer';
        $contractorList['organisation'] = 'Vinove Overseas';
        $contractorList['organisation1'] = 'Hytech Professionals';
        
        dd(json_encode($contractorList));
    }
}
