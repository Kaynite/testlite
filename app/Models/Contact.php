<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $dates = ['birthday'];
    protected $fillable = ['name', 'email', 'birthday', 'company'];

    public function setBirthdayAttribute($birthday)
    {
        $this->attributes['birthday'] = Carbon::parse($birthday);
    }

    public function getBirthdayAttribute($birthday)
    {
        return $birthday = Carbon::parse($birthday)->format('m/d/Y');
    }
}
