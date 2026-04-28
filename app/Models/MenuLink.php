<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'group',
        'label',
        'url',
        'is_external',
        'order',
    ];

    protected $casts = [
        'is_external' => 'boolean',
    ];

    /**
     * Get menu links grouped by their group name, ordered by 'order'.
     */
    public static function getGrouped()
    {
        return self::orderBy('group')->orderBy('order')->get()->groupBy('group');
    }
}
