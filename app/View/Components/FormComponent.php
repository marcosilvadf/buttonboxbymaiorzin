<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormComponent extends Component
{
    /**
     * Create a new component instance.
     */

    public $action;
    public $method;
    public $id;

    public function __construct($action = '#', $method = 'POST', $id = null)
    {
        $this->action = $action;
        $this->method = strtoupper($method);
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-component');
    }
}
