<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $data)
 * @method static where(string $string, int $int)
 */
class Customer extends Model
{
    //to remove check only on name.
    /*protected $fillable = ['name'];*/

    //remove all the check
    protected $guarded = [];
}
