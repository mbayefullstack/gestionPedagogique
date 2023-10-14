<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['libelle'];


    public function professeurs(){
        return $this->belongsToMany(Professeur::class, "prof_modules");
    }

    public function profModules(){
        return $this->hasMany(ProfModule::class);
    }



}
