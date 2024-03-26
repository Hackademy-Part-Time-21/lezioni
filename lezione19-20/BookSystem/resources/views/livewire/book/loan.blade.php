<div>
    <div>
        <h1>Loan Book</h1>
    
        <x-success-message/>
    
        <form wire:submit.prevent="loan">
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" wire:model.change="email" class="form-control @error('email') is-invalid @enderror">
                @error('email')
                    <span>{{$message}}</span>
                @enderror
            </div>            
           
            <button type="submit" class="btn btn-primary mt-5">
                Loan
            </button>
    
    
        </form>
        
        
        
    </div>
    
</div>
