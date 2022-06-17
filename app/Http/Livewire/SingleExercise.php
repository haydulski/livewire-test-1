<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\Redirector;

class SingleExercise extends Component
{
    public array $exData;

    public function render(): View
    {
        return view('livewire.single-exercise');
    }

    public function openSite(string $id): Redirector
    {
        return redirect()->route('workout', ['id' => $id]);
    }
}
