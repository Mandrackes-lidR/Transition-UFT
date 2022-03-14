<?php

namespace App\View\Components;

use Closure;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;
use Illuminate\View\View;

class Form extends Component
{
    public array|Collection $institutions;

    public array $categories;

    /**
     * Create a new component instance.
     *
     * @param Collection|static[] $institutions
     * @param array $categories
     */
    public function __construct(Collection|array $institutions, array $categories)
    {
        $this->institutions = $institutions;
        $this->categories = $categories;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render(): string|Closure|View
    {
        return view('components.form');
    }
}
