<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ElectionChoice extends Model {

    protected $table = 'eb_election_choices';

    public $timestamps = false;
    
    protected $fillable = [];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    // Relationships
    
    public function votes(){
        
       return $this->hasMany('App\ElectionResult', 'choice_id');
        
    }

}
