<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\Redirector;

class Home extends Component
{
    public string $message = '';

    public function render(): View
    {
        return view('livewire.home');
    }

    public function categoriesRedirect(): Redirector
    {
        return redirect()->route('exercises');
    }
}
