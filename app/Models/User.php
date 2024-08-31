<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\User\UserRoleEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use PhpParser\Comment;

/**
 * @property UserRoleEnum role
 * @property string name
 *
 */

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role'=> UserRoleEnum::class
        ];
    }
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
    public function isAdmin(): bool {
        return $this->role === UserRoleEnum::ADMIN;
    }

    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class, 'author_id');
    }

    public function subscription(): HasOne
    {
        return $this->subscriptions()->when(auth()->id(),function($query){
            $query->where('reader_id', auth()->id());
        })->one();
    }

    public function readers(): BelongsToMany
    {
        return $this->belongsToMany( User::class, Subscription::class, 'author_id', 'reader_id');
    }
    public function authors(): BelongsToMany
    {
        return $this->belongsToMany( User::class, Subscription::class, 'reader_id', 'author_id');
    }
}
