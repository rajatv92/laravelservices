<?php

namespace App\Http\Controllers;
use App\User;
use App\UserProfile;
use DB;


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
        $contractorList['organisation2'] = 'Hytech Professionals India';
        
        dd(json_encode($userProfile));
    }
    public function UserList(){
        $users = User::select('id','email as user_email')->first();
//            $users = User::first();
        
        $uuuu = User::Join('eb_user_profiles', 'eb_users.id', '=', 'eb_user_profiles.user_id')->get();
        
        foreach($uuuu as $u){
            dd(json_encode($u));
        }
        dd($uuuu);
        $users = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->select('users.*', 'contacts.phone', 'orders.price')
            ->get();
            dd(json_encode($users));
        $user = UserProfile::all();
        
        dd(($user));
    }
}
