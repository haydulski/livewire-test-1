<section class="main workout">
    <div wire:loading>
        <div class="loading-screen">
            <div class="spinner-grow text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
    <div class="container-xl py-5">
        <div class="row mt-5">
            <div class="col-12">
                <h1>{{ $workout['name'] }}</h1>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm-4 col-md-2 d-flex flex-column justify-content-center">

                <p>Body part:</p>
                <h4>{{ $workout['bodyPart'] }}</h4>
                <hr>
            </div>
            <div class="col-sm-4 col-md-2 d-flex flex-column justify-content-center">

                <p>Equipment:</p>
                <h4>{{ $workout['equipment'] }}</h4>
                <hr>
            </div>
            <div class="col-sm-4 col-md-2 d-flex flex-column justify-content-center">

                <p>Target:</p>
                <h4>{{ $workout['target'] }}</h4>
                <hr>
            </div>
            <div class="col-md-6 px-4">
                <img src="{{ $workout['gifUrl'] }}" alt="workout gift">
            </div>
        </div>
    </div>
    <div class="container-xl">
        <div class="row">
            <div class="col-11"><button class="btn btn-light" wire:click="goBack()">Go back</button></div>
        </div>
    </div>
</section>
