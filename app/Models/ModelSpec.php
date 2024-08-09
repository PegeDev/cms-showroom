<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ModelSpec extends Model
{
    use HasFactory;

    public function model_spec(): BelongsTo
    {
        return $this->belongsTo(TypeModel::class);
    }

    public function model_specs(): HasMany
    {
        return $this->hasMany(TypeModel::class);
    }
}
