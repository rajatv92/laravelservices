<?php

namespace App\Http\Controllers;
use App\User;
use App\UserProfile;
use Log;
use Illuminate\Http\Request;
use App\Election;
use App\ElectionChoice;
use App\ElectionResult;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ContractorController extends Controller
{
    public function ContractorList()
    {
        $user =User::find(1);
        dd($user);
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
    public function UserList($params){
        
        $aa = User::with('userProfile')->get();
        dd($aa->toArray());
        foreach($aa as $a){
            dd(($a));
        }
        print_r($aa);die;
        $aa = User::find(2371)->userProfile;
        print_r($aa);die;
        
        
        
        
        
        
        
       $params = json_decode(urldecode($params),TRUE);
       
      
       
       
       
         
        $filter = $params;
      
        $users = User::select('id','email as user_email','status_id')
                ->get()->map(function ($item, $key) {
        $item['status'] = ($item['status_id'] != 2)?'Active':'Inactive';
            
            return $item;
       });
       
       $filtered = $users->filter(function ($value, $key) use($filter) { 
           
           return in_array($value['status'],$filter);
          });

      
       echo  '<br>'.(print_r((json_encode($filtered->all()))));die();
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
    
    public function organiseElection(Request $request){

      $electionId =  app('db')->transaction(function() use($request) {
         
         $election = new Election;

         $election->name = $request->name;
         $election->description = $request->description;
         $election->election_start_date = $request->election_start_date;
         $election->election_end_date = $request->election_end_date;
         
         $election->save();
         $electionId = $election->id;
         
         foreach($request->choice as $ch){
         $choice = new ElectionChoice();
         $choice->election_id = $electionId;
         $choice->choice = $ch;
         
         $choice->save();
         }
         
         return $electionId;

         });
         
         Log::info('A new election is created with id: '.$electionId);
         return response()->json(['status' => 200, 'message' => 'Election created successfully','data' =>$electionId]);
 
    }
    
    public function doVoting(Request $request){
        
  
        $vote = new ElectionResult;
        
        $vote->choice_id = $request->choice_id;
        $vote->election_id = $request->election_id;
        $vote->voted_by = $request->voted_by;
        $vote->updated_at = Carbon::now();
        
        $vote->save();
        
        return response()->json(['status' => 200, 'message' => 'Voted successfully successfully']);
    }
    
    public function declareResult(){
        
        $aa = ElectionChoice::with('votes')->whereElection_id(2)->get();
        dd($aa->toArray());
        $electionWithChoice = Election::with(['choices.votes'])->whereId(2)->get();
        
        
        
//        dd($electionWithChoice[0]['choices'][0]['votes']->count());
       
//       $electionWithChoice = Election::with(['choices.votes' => function($query){
//           dd($query);
//           $query->select('id');
//       }])->whereId(2)->get();
//       dd($electionWithChoice[0]->choices->toArray());
//       foreach($electionWithChoice as $choice){
//           dd($choice);
//       }
//      $electionWithChoice =  Election::find(2)->choices;
      
      return response()->json(['status' => 200, 'message' => 'Voted successfully successfully','data' => $electionWithChoice]);
        
    }
}
