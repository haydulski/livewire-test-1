<div class="col p-2 bg-body text-center">
    <a href="#" wire:click="openSite('{{ $exData['id'] }}')">
        <img src="{{ $exData['gifUrl'] }}" alt="{{ $exData['id'] }}-picture" loading="lazy">
        <h3 class="mt-1">{{ $exData['name'] }}</h3>
    </a>
</div>
