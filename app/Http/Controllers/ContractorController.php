<?php

namespace App\Http\Controllers;
use App\User;


class ContractorController extends Controller
{
    public function ContractorList()
    {
        $user =User::find(1);
        $userProfile = User::find(1)->userProfile;
        $users['id'] = $user->id;
        $users['email'] = $user->email;
        $users['firstname'] = $userProfile->first_name;
        $users['lastname'] =  $userProfile->last_name;
        dd(json_encode($users));
        $userProfile = User::find(1)->userProfile;
        $contractorList['name'] = 'Rajat Verma';
        $contractorList['profile'] = 'Laravel Developer';
        $contractorList['organisation'] = 'Vinove Overseas';
        $contractorList['organisation1'] = 'Hytech Professionals';
        
        dd(json_encode($userProfile));
    }
}
