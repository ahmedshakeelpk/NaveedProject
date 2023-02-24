<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactServicesCategories extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'contact_services_id', 'agent_name', 'agent_email', 'agent_img'
    ];
    
    public function contactServices() {
        return $this->belongsTo('App\Models\ContactServices');
    }
}
