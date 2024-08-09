<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypeModel extends Model
{
    use HasFactory;

    public function type_model(): BelongsTo
    {
        return $this->belongsTo(Model::class);
    }

    public function type_models(): HasMany
    {
        return $this->hasMany(Model::class);
    }
}
