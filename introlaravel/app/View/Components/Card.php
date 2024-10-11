<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{

    public $encabezado;
    public $titulo;
    public $textoBoton;

    /**
     * Create a new component instance.
     */

    public function __construct($encabezado,$titulo,$textoBoton)
    {
        $this->encabezado= $encabezado;
        $this->titulo= $titulo;
        $this->textoBoton= $textoBoton;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
