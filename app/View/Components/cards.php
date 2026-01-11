<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class cards extends Component
{
    public $totals;
    public $description;
    /**
     * Create a new component instance.
     */
    public function __construct($totals = 0, $description = "")
    {
        $this->totals = $totals;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cards');
    }
}
