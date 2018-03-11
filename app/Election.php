<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Election extends Model {
    
    protected $table = 'eb_election';
    
    public $timestamps = false;

    protected $fillable = [];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    // Relationships
    
    public function choices(){
        return $this->hasMany('App\ElectionChoice', 'election_id');
    }

}
