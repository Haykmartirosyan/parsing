<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class xMatch extends Model
{
    protected $table = 'x_matches';

    protected $fillable = [
      'name',
      'price',
      'time',
      'league',
      'command',
      'win',
    ];
}
