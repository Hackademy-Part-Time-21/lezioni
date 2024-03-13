<div>
    <h3>Contatore con livewire</h3>

    <h5>{{$count}}</h5>

    <button class="btn btn-primary" wire:click="increment"> Increment </button>

    <button class="btn btn-warning" wire:click="decrement"> Decrement </button>

    <button class="btn btn-danger" wire:click="azzera"> Azzera </button>

    <br>
    <label for="">Scegli il numero di partenza (live o as-we-type)</label>
    <input type="number" wire:model.live="count">
    <br>
    <label for="">Scegli il numero di partenza (live.debounce)</label>
    <input type="number" wire:model.live.debounce.2000ms="count">

    <br>
    <label for="">Scegli il numero di partenza (live.blur)</label>
    <input type="number" wire:model.blur="count">

    <br>
    <label for="">Scegli il numero di partenza (live.change)</label>
    <input type="number" wire:model.change="count">

    <br>
    <div x-data="{number:0}">
        <label for="">Somma al contatore</label>
        <input type="number" x-model="number">
        <button wire:click="sum(number)">+</button>    
    </div>

</div>
