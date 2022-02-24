<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
     protected $fillable = [
        'title',
        'body',
        'approved',
        'blogger_id',
        'admin_id'
    ];
     public function blogger()
    {
        return $this->belongsTo(Blogger::class);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
