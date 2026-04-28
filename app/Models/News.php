<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'headline',
        'description',
        'link',
        'og_image',
        'manual_image',
        'category',
        'created_by',
    ];

    /**
     * Get the best available image for display.
     * Priority: manual_image > og_image > null
     */
    public function getDisplayImageAttribute(): ?string
    {
        if ($this->manual_image) {
            return asset('images/news/' . $this->manual_image);
        }

        return $this->og_image;
    }

    /**
     * Get the user who created this news.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
