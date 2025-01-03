<?php
namespace App\View\Components;
use Illuminate\View\Component;

class Tabs extends Component
{
    public $flags;
    public $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($flags = [], $title)
    {
        $this->flags = $flags;
        $this->title = $title;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tabs');
    }
}