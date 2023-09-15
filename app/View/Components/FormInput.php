<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;
use Illuminate\View\Component;

class FormInput extends Component
{

    public $foo;
    public $field;
    public $wibble;

    /**
     * Create a new component instance.
     */
    public function __construct($field)
    {
        $this->foo    = "Wobble Wibble Wurble";
        $this->wibble = Session::get('errors');
        $this->field = $field;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-input');
    }
}
