<?php

namespace App\Http\Livewire;

use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Exercises extends Component
{
    public array $catList = [
        'all',
        'back',
        'cardio',
        'chest',
        'lower arms',
        'lower legs',
        'neck',
        'shoulders',
        'upper arms',
        'upper legs',
        'waist',
    ];

    public string $currentCat = 'all';

    public array $allExercises;

    public array $noFilterExercises = [];

    public array $testCat = ['back'];

    public int $pagesAmount = 0;

    public int $currentPage = 1;

    public int $pgLoopStart = 1;

    public int $pagination = 8;

    public function mount(): void
    {
        $this->updateExercises();
        $this->setPagination();
        $this->noFilterExercises = $this->allExercises;
    }

    public function render(): View
    {
        return view('livewire.exercises');
    }

    public function getExercises(string $name): array
    {
        return [$name];
    }

    public function setPgNumber(string $number): void
    {
        $this->pagination = (int) $number;
        $this->setPagination();
    }

    public function nextPage(string $action): void
    {
        switch ($action) {
            case 'next':
                $this->currentPage = $this->currentPage + 1;
                break;
            case 'prev':
                if ($this->currentPage === 1) {
                    return;
                }
                $this->currentPage = $this->currentPage - 1;
                break;
            default:
                $this->currentPage = (int) $action;
                break;
        }
        $this->setPagination();
    }

    public function setCat(string $cat): void
    {
        if ($cat === 'all') {
            $this->allExercises = $this->noFilterExercises;
            $this->currentCat = 'all';
        } else {
            $this->currentCat = $cat;
            $filteredArray = array_filter($this->noFilterExercises, function ($var) use ($cat) {
                return $var['bodyPart'] == $cat;
            });
            $this->allExercises = array_values($filteredArray);
        }
        $this->currentPage = 1;
        $this->setPagination();
    }

    private function updateExercises(): void
    {
        $this->allExercises = Cache::remember('allExercises2', 60 * 60 * 24 * 30, function () {
            $response = Http::withHeaders([
                'X-RapidAPI-Key' => env('RAPID_API_KEY'),
                'X-RapidAPI-Host' => env('RAPID_HOST'),
            ])->get(env('EXERCISES_API_URL'));
            if ($response->successful()) {
                return $response->json($key = null);
            } else {
                throw new Exception('Api connection error');
            }
        });
    }

    private function setPagination(): void
    {
        $this->pagesAmount = (int) count($this->allExercises) / $this->pagination;
        $this->pgLoopStart = (($this->currentPage * $this->pagination) + 1) - $this->pagination;
    }
}
