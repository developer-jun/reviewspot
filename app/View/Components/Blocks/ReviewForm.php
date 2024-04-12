<?php

namespace App\View\Components\Blocks;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class ReviewForm extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public int $businessId)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.blocks.review-form');
    }

    /**
     * Whether the component should be rendered
     */
    public function shouldRender(): bool
    {
        return Auth::check();
    }
}
