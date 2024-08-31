<?php

namespace App\View\Components;

use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;


class RecentPosts extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Collection $posts
    )
    {
        $this->posts = Post::query()->latest()->limit(3)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.recent-posts');
    }
}
