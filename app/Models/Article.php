<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function pages(){
        return $this->belongsTo(Page::class);
    }
    use HasFactory;
}
