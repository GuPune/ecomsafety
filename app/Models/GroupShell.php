<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupShell extends Model
{
    //

    protected $table = 'group_shell';

    protected $fillable = [
        'id',
        'name_en',
        'name_th',
        'image',
        'sequence',
        'status',
    ];
}
