<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'description'
    ];

    public function taskCompletes()
    {
        return $this->hasMany(TaskComplete::class);
    }

    public function getIsCompletedByUser($user_id)
    {
        return $this->taskCompletes()->where('user_id', '=', $user_id)->first()->image_path != null; 

    }
}
