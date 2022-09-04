<?php

namespace App\View\Components;

use Illuminate\View\Component;

class headerBanner extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $link,
        public string $text,
        public string $icon = '<i class="fab fa-facebook"></i>',
        public bool $external = false,
    ) {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header-banner');
    }
}
