<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Task extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    protected $with = ['users'];
    protected static function booted()
    {
        static::creating(function ($task) {
            $task->created_by = auth()->id();
            $task->updated_by = auth()->id();
        });

        static::updating(function ($task) {
            $task->updated_by = auth()->id();
        });
    }
    public function users()
    {
        return $this->belongsToMany(User::class,'user_tasks');
    }


}
