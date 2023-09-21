<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class Nursery extends Model
{
    use HasFactory;

    public function scopeOrganisation(Builder $query): void
    {
        $query->where('organisation_id', Auth::user()->organisation_id);
    }
}
