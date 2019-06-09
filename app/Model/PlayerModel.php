<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PlayerModel extends Model
{
    //
    protected $table='player';
    protected $fillable=['fname','lname','team_id'];
}
