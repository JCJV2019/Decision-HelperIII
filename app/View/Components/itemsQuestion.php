<?php

namespace App\View\Components;

use Illuminate\View\Component;

class itemsQuestion extends Component
{
    public $itemsPositives;
    public $itemsNegatives;
    public $question;
    public $userAuth;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($itemsPositives,$itemsNegatives,$question,$userAuth)
    {
        $this->itemsPositives = $itemsPositives;
        $this->itemsNegatives = $itemsNegatives;
        $this->question = $question;
        $this->userAuth = $userAuth;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.items-question');
    }
}
