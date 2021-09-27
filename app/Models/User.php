<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];    
    
    public function tasks() 
    {
        return $this->hasMany(TaskComplete::class);
    }

    public function getTaskCompleteCount()
    {
        $tasks = $this->tasks();
        return $tasks->where('image_path', '!=', null)->count();
    }

    public function getTaskPercentage()
    {
        $task_count = $this->tasks->count();
        if ($task_count == 0) return 0;
        return ceil(($this->getTaskCompleteCount() / $this->tasks->count())*100);
    }
}
