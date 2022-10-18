<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'login',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The user feedback sending time limit
     * 
     * @var integer
     */

    protected $limitInHours = 24;

    /**
     * Get the user last feedback create time
     * @return string
     */
    public function getLastFeedbackTime()
    {
        return $this->last_feedback ?? false;
    }

    /**
     * Get the user feedback send enable formatted time.
     * 
     * @param string $format
     * @return string
     */
    public function getFeedbackSendEnableTime($format = 'H:i d.m.Y')
    {
        if (!$this->getLastFeedbackTime())
            return false;

        $time = new Carbon($this->getLastFeedbackTime());
        $time = $time->addHours($this->limitInHours)->format($format);

        return $time;
    }

    /**
     * 
     * Determines the user can send feedback message
     * 
     * @return Carbon
     */

    public function canSend()
    {
        if (!$this->getLastFeedbackTime())
            return true;

        $hours = Carbon::now()->diffInHours($this->getLastFeedbackTime());

        return $hours >= $this->limitInHours ? true : false;
    }
}
