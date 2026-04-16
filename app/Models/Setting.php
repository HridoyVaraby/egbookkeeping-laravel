<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Mews\Purifier\Facades\Purifier;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];

    protected function value(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                // Allow HTML for pricing notice, sanitize it
                if ($this->key === 'pricing_notice_content') {
                    return Purifier::clean($value, 'youtube'); // Allows safe HTML
                }
                // For non-HTML settings, escape output
                return e($value);
            },
            set: fn ($value) => $value
        );
    }
}
