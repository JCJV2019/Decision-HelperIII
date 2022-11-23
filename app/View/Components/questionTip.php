<?php

namespace App\View\Components;

use Illuminate\View\Component;

class questionTip extends Component
{
    public $puntuacionP;
    public $puntuacionN;
    public $semaforo;
    public $question;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($puntuacionP, $puntuacionN, $semaforo, $question)
    {
        $this->puntuacionP = $puntuacionP;
        $this->puntuacionN = $puntuacionN;
        $this->semaforo = $semaforo;
        $this->question = $question;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.question-tip');
    }
}
