<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductShell extends Model
{
    //

    protected $table = 'product_shell';

    protected $fillable = [
        'id',
        'product_id',
        'group_shell_id',
    ];
}
