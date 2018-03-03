<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class UserProfile extends Model
{

     protected $table = 'eb_user_profiles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'user_type', 'add_1','add_2', 'zip_code', 'contact_no1', 'city_id', 'state_id','job_title'
    ];
}
