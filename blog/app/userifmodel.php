<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userifmodel extends Model
{
    // use Notifiable;
    protected $table = 'userif';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ten', 'gioitinh', 'name','remember_token',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         
    ];
}
