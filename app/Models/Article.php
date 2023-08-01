<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function page(){
        return $this->belongsTo(Page::class);
    }
    use HasFactory;
}
