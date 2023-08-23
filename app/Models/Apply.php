<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    use HasFactory;
    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }
    public function company()
    {
        return $this->belongsTo(Company_profile::class, 'company_id', 'id');
    }
    public function diplomer()
    {
        return $this->belongsTo(Employe_profile::class, 'diplomer_id', 'id');
    }
}
