<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as ModelBase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Model extends ModelBase
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'contents' => 'array',
    ];

    // protected function casts(): array
    // {
    //     return ['contents' => 'array'];
    // }
}
