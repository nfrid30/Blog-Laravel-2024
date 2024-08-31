<?php

namespace App\View\Components;

use App\Models\Post;
use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Archives extends Component
{
    public array $datesArray;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $posts = Post::query()->select('created_at')->latest()->get();

        $this->datesArray = [];

        foreach ($posts as $post) {
            $this->datesArray[$post->created_at->year][$post->created_at->format('F')] = true;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.archives');
    }
}
