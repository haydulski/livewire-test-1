<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Livewire\Redirector;

class Workout extends Component
{
    public string  $workoutId;

    public array $workout;

    private const DEF = [
        'bodyPart' => 'upper legs',
        'equipment' => 'body weight',
        'gifUrl' => 'http://d205bpvrqc9yn1.cloudfront.net/1512.gif',
        'id' => '1512',
        'name' => 'Check your cache data',
        'target' => 'quads',
    ];

    public function mount(): void
    {
        $this->workoutId = Route::current()->parameter('id');
        $this->setWorkoutData();
    }

    public function render(): View
    {
        return view('livewire.workout');
    }

    public function goBack(): Redirector
    {
        return redirect()->route('exercises');
    }

    private function setWorkoutData(): void
    {
        $all = Cache::get('allExercises2', self::DEF);
        if (count($all) < 2) {
            $this->workout = $all;

            return;
        }
        $id = $this->workoutId;
        $workout = array_filter($all, function ($single) use ($id) {
            return $single['id'] === $id;
        });
        $this->workout = array_values($workout)[0];
    }
}
