<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactServices extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function contactServicesCategories() {
        return $this->hasMany('App\Models\ContactServicesCategories');
    }

}
