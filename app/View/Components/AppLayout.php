<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    public $pageTitle;

    /**
     * Create a new component instance.
     *
     * @param string $pageTitle
     * @return void
     */
    public function __construct($pageTitle = '')
    {
        $this->pageTitle = $pageTitle;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.app');
    }
}
