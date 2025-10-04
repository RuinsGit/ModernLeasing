<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'description',
        'image',
        'order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer'
    ];

    public static function getActiveTeamMembers()
    {
        return self::where('is_active', true)
                   ->orderBy('order')
                   ->get();
    }

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('uploads/team-members/' . $this->image);
        }
        return null;
    }
}
