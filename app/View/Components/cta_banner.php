<?php

namespace App\View\Components;

use Illuminate\View\Component;

class cta_banner extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $title,
        public string $text,
        public string $url,
        public string $urlText,
        public string $icon = '<i class="fab fa-discord"></i>',
        public bool $singleAsso = false,
        public bool $external = false,
    ) {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cta_banner');
    }
}
