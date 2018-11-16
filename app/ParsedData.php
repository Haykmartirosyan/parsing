<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParsedData extends Model
{
    protected $table = 'parsed_datas';

    protected $fillable = [
      'group',
      'name',
      'price',
      'win',
    ];

    /**
     * @param array $fillable
     */
    public function setFillable(array $fillable): void
    {
        $this->fillable = $fillable;
    }
}
