<?php

namespace App;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use Searchable;

    protected $casts = [
        'tags' => 'json',
    ];
}
