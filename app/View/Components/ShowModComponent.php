<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowModComponent extends Component
{
    /**
     * Create a new component instance.
     */

    public $mod;
    public $owner;
    public $report;

    public function __construct($mod, $owner = false, $report = false)
    {
        $this->mod = $mod;
        $this->owner = $owner;
        $this->report = $report;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.show-mod-component');
    }
}
