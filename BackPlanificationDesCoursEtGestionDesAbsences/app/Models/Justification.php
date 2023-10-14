<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Justification extends Model
{
    use HasFactory, SoftDeletes;

    public function attache()
    {
        return $this->belongsTo(Attache::class);
    }

    public function emmergement()
    {
        return $this->belongsTo(Emmergement::class);
    }
}
