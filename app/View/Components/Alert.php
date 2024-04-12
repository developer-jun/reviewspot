<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Str;

class Alert extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $type, public string $message,)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert');
    }

    /**
     * Determine if the given option is the currently selected option.
     */
    public function getCSSClasses($type = ''): string
    {   
        $colorVariants = (object) [
            'info' => 'bg-cyan-100 border-cyan-500 text-cyan-700',
            'success' => 'bg-lime-100 border-lime-500 text-lime-700',
            'error' => 'bg-rose-100 border-rose-500 text-rose-700',
            'warning' => 'bg-yellow-100 border-yellow-500 text-yellow-700',
        ];
        
        $typeColor = isset($colorVariants->$type) ? $colorVariants->$type : 'bg-gray-100 border-gray-500 text-gray-700';

        return $typeColor;
    }

    /**
     * Whether the component should be rendered
     */
    public function shouldRender(): bool
    {
        return Str::length($this->message) > 0;
    }
}
