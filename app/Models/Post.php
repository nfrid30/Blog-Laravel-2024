<?php

namespace App\Models;

use App\Enums\Post\PostStatusEnum;
use App\Observers\PostObserver;
use Couchbase\Role;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Collection;

/**
 * @property string title
 * @property string slug
 * @property string description
 * @property string text
 * @property PostStatusEnum status
 * @property int user_id
 * @property int category_id
 *
 * @property User user
 *
 */

#[ObservedBy([PostObserver::class])]
class Post extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'slug',
        'description',
        'text',
        'status',
        'image',
        'user_id',
        'category_id',
    ];

    protected function casts(): array
    {
        return [
            'status' => PostStatusEnum::class
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->whereNull('comment_id')->latest();
    }

    public function scopeFilterByCategory(Builder $query, string|null $categoryId): void
    {
        $query->when($categoryId, function (Builder $query) use ($categoryId) {
            $query->where('category_id', $categoryId);
        });
    }

    public function scopeFilterByTag(Builder $query, string|null $tag): void
    {
        $query->when($tag, function (Builder $query) use ($tag) {
            $query->whereHas('tags', function ($query) use ($tag) {
                $query->where('name', $tag);
            });
        });
    }

    public function scopeSearch(Builder $query, $search): void
    {
        $query->when($search, function (Builder $query) use ($search) {
            $query->where('title', 'like', '%' . $search . '%');
        });
    }

    public function reactions(): HasMany
    {
        return $this->hasMany(Reaction::class);
    }

    public function reaction(): HasOne
    {
        return $this->reactions()->when(auth()->id(),function($query){
            $query->where('user_id', auth()->id());
        })->one();
    }
}
