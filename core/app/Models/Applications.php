<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'user_id', 'form', 'attachments', 'status', 'status_color'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
