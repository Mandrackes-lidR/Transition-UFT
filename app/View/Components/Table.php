<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\View\Component;

class Table extends Component
{
    /**
     * @var array
     */
    public array $columns;

    /**
     * @var Model|array|AbstractPaginator
     */
    public Model|array|AbstractPaginator $elements;

    /**
     * Table constructor.
     * @param array $columns
     * @param Model|array|AbstractPaginator $elements
     */
    public function __construct(array $columns, Model|array|AbstractPaginator $elements)
    {
        $this->columns = $columns;
        $this->elements = $elements;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('components.table');
    }
}
