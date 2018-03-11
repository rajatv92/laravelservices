<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ElectionResult extends Model {

    protected $fillable = [];

    protected $dates = [];
    
    public $timestamps = false;
    
    protected $table = 'eb_election_votes';

    public static $rules = [
        // Validation rules
    ];

    // Relationships

}
