<?php

namespace App\View\Components;

use Illuminate\View\Component;

class questionList extends Component
{
    public $questions;
    public $userAuth;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($questions, $userAuth)
    {
        $this->questions = $questions;
        $this->userAuth = $userAuth;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.question-list');
    }
}
