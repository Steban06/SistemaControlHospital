<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPreference extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_preferences';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'theme',
        'notify_new_assets',
        'notify_maintenance',
        'notify_reports',
        'auto_backup_enabled',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'notify_new_assets' => 'boolean',
        'notify_maintenance' => 'boolean',
        'notify_reports' => 'boolean',
        'auto_backup_enabled' => 'boolean',
    ];

    /**
     * Get the user that owns the preferences.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get or create default preferences for a user.
     *
     * @param int $userId
     * @return UserPreference
     */
    public static function getOrCreateForUser($userId)
    {
        return static::firstOrCreate(
            ['user_id' => $userId],
            [
                'theme' => 'light',
                'notify_new_assets' => true,
                'notify_maintenance' => true,
                'notify_reports' => false,
                'auto_backup_enabled' => false,
            ]
        );
    }
}
