<?php

namespace App\View\Components;

use App\Models\Post;
use App\Models\Tag;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;


class TagSelect extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Collection $tags, public Post|null $post)
    {
        $this->tags = Tag::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tag-select');
    }
}
