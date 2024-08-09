<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ModelSpecDetail extends Model
{
    use HasFactory;

    public function model_spec_detail(): BelongsTo
    {
        return $this->belongsTo(ModelSpec::class);
    }

    public function model_spec_details(): HasMany
    {
        return $this->hasMany(ModelSpec::class);
    }
}
