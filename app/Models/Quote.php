<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $uuid
 * @property string $quote
 * @property string $quotee
 */
class Quote extends Model
{
    use HasFactory;

    protected $fillable = ['uuid', 'quote', 'quotee'];

    protected static function booted(): void
    {
        static::creating(function (Quote $quote) {
            $quote->uuid = str()->uuid();
        });
    }
}
