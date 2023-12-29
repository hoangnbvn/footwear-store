<?php

namespace App\View\Components;

use Illuminate\View\Component;

class HeroBanner extends Component
{
    public $smallText;
    public $midText;
    public $largeText1;
    public $desc;
    public $image;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $smallText,
        string $midText,
        string $largeText1,
        string $desc,
        string $image
    ) {
        $this->smallText = $smallText;
        $this->midText = $midText;
        $this->largeText1 = $largeText1;
        $this->desc = $desc;
        $this->image = $image;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.hero-banner');
    }
}
