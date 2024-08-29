<?php

namespace App\Models;

use App\Events\BlogCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Blog extends Model
{
    protected $fillable = [
        'message',
    ];
    
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    protected $dispatchEvents = [
        'created' => BlogCreated::class,
    ];

    use HasFactory;
}
