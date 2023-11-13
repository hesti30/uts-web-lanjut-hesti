<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'body',
        'thumbnail',
        'category_id'
    ];

    protected $dates = ['created_at'];

    public function category()
    {
        return $this->belongsTo(ProjectCategory::class);
    }
}
