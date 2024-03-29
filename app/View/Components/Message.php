<?php

namespace App\View\Components;

use Illuminate\View\Component;

use function PHPSTORM_META\type;

class Message extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $type;
    public $message;
    public $page;

    public function __construct($type, $message,$page)
    {
        $this->type = $type;
        $this->message = $message;
        $this->page = $page;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.message');
    }
}
