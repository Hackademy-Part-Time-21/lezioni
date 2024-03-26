<div>
    <h1>Edit Book</h1>

    <x-success-message/>

    <form wire:submit.prevent="update">
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" wire:model.change="title" class="form-control @error('title') is-invalid @enderror">
            @error('title')
                <span>{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Genre</label>
            <input type="text" wire:model.change="genre" class="form-control @error('genre') is-invalid @enderror">
            @error('genre')
                <span>{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <div class="form-floating">
                <textarea class="form-control @error('description') is-invalid @enderror" wire:model.change="description" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Description</label>
                @error('description')
                    <span>{{$message}}</span>
                @enderror
            </div>
        </div>

        
        <select class="form-select @error('author_id') is-invalid @enderror" wire:model.change="author_id" >
            <option >Choose Author</option>
            @foreach($authors as $author)
            <option 
            value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>
            @endforeach
        </select>
        @error('author_id')
            <span>{{$message}}</span>
        @enderror

        <div class="mb-3">
            <label for="formFile" class="form-label">Cover</label>
            <input class="form-control" type="file" id="formFile" wire:model="cover">
            @error('cover')
                <span>{{$message}}</span>
            @enderror
        </div>

        <div wire:loading wire:target="cover">Uploading...</div>

        @if ($cover)
            <img src="{{$cover->temporaryUrl()}}" alt=""  style="height: 200px;width:200px;">
        @elseif($old_cover)
            <img src="{{Storage::url($old_cover)}}" alt=""  style="height: 200px;width:200px;">
            <a class="btn btn-danger" wire:click="deleteCover">Elimina Foto</a>
        @endif
       
        <button type="submit" class="btn btn-primary mt-5">

            Save

        </button>


    </form>
    
    
    
</div>
