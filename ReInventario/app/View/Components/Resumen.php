<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Resumen extends Component
{
    public $nombre_encargado;
    public $resumen;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($nombreEncargado, $resumen)
    {
        $this->nombre_encargado = $nombreEncargado;
        $this->resumen = $resumen;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.resumen');
    }
}
