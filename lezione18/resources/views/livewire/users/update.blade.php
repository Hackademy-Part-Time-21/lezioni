<div>
    <h2>Modifica un utente</h2>
    
    <form wire:submit.prevent="update">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" wire:model.change="name" class="form-control">
            @error('name')
                <span>{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
          <label class="form-label">Email address</label>
          <input type="email" wire:model.change="email" class="form-control" >
            @error('email')
                <span>{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
          <label  class="form-label">Password</label>
          <input type="password"  wire:model.change="password" class="form-control" >
          @error('password')
            <span>{{$message}}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

</div>
