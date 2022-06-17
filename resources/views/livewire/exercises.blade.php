<div class="container-xl py-5 exercises">
    <div wire:loading>
        <div class="loading-screen">
            <div class="spinner-grow text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
    <div class="row">
        <col-12>
            <h1>exercises</h1>
        </col-12>
    </div>
    <div class="row filter mt-5">
        <div class="col-12">
            <p>Filters:</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <ul class="pagination">
                <li class="page-item disabled">
                    <p class="page-link"><strong>Category: </strong></p>
                </li>
                @foreach ($catList as $cat)
                    <li class="page-item {{ $currentCat == $cat ? 'active' : null }}">
                        <button class="page-link"
                            wire:click="setCat('{{ $cat }}')">{{ $cat }}</button>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>
    <div class="row">
        <div class="col-12">

            <ul class="pagination">
                <li class="page-item disabled">
                    <p class="page-link"><strong>Amount of exrcises by page: </strong></p>
                </li>
                <li class="page-item {{ $pagination == 8 ? 'active' : null }}">
                    <button class="page-link" wire:click="setPgNumber(8)">8</button>
                </li>
                <li class="page-item {{ $pagination == 16 ? 'active' : null }}">
                    <button class="page-link" wire:click="setPgNumber(16)">16</button>
                </li>
                <li class="page-item {{ $pagination == 32 ? 'active' : null }}">
                    <button class="page-link" wire:click="setPgNumber(32)">32</button>
                </li>
                <li class="page-item {{ $pagination == 64 ? 'active' : null }}">
                    <button class="page-link" wire:click="setPgNumber(64)">64</button>
                </li>
            </ul>
        </div>

    </div>

    @if ($allExercises !== null)

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
            @for ($j = $pgLoopStart; $j < $pgLoopStart + $pagination; $j++)
                @if (!isset($allExercises[$j]))
                @break
            @endif
            @livewire('single-exercise', ['exData' => $allExercises[$j]], key($allExercises[$j]['id']))
        @endfor
    </div>
    @if ($pagesAmount > 1)
        <?php $leftPages = $pagesAmount > 10 ? 10 : round($pagesAmount); ?>

        <div class="row pagination-links mt-2">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item {{ $currentPage == 1 ? 'disabled' : null }}">
                        <button class="page-link" wire:click="nextPage('prev')"
                            aria-label="Previous">Previous</button>
                    </li>
                    @if ($currentPage < 6)
                        @for ($i = 1; $i <= $leftPages; $i++)
                            <li class="page-item  {{ $i === $currentPage ? 'active' : null }}">
                                <button class="page-link" wire:click="nextPage({{ $i }})">
                                    {{ $i }}
                                </button>
                            </li>
                        @endfor
                    @elseif($currentPage > 6 && $pagesAmount > 10)
                        @for ($i = $currentPage - 5; $i < $currentPage + 5; $i++)
                            <li class="page-item  {{ $i === $currentPage ? 'active' : null }}">
                                <button class="page-link" wire:click="nextPage({{ $i }})">
                                    {{ $i }}
                                </button>
                            </li>
                        @endfor
                    @else
                        @for ($i = 1; $i <= $leftPages; $i++)
                            <li class="page-item  {{ $i === $currentPage ? 'active' : null }}">
                                <button class="page-link" wire:click="nextPage({{ $i }})">
                                    {{ $i }}
                                </button>
                            </li>
                        @endfor
                    @endif

                    <li class="page-item">
                        <button class="page-link" wire:click="nextPage('next')" aria-label="Next">Next</button>
                    </li>
                </ul>
            </nav>
        </div>
    @endif
@endif

</div>
