<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Success extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render(): string|View
    {
        return view('components.success');
    }
}
