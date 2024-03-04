<x-main>

    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{session('error')}}
    </div>
    @endif

    <form method="POST" action="{{route('tickets.update',$ticket)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Subject</label>
            <input type="text" name="subject" class="form-control" value="{{old('subject',$ticket->subject)}}" >
            @error('subject')
                <span>{{$message}}</span>
            @enderror
        </div>
        
        <div class="mb-3">
            <div class="form-floating">
                <textarea class="form-control" name="description" style="height: 100px">{{old('description',$ticket->description)}}</textarea>
                <label for="floatingTextarea2">Description</label>
              </div>
            @error('description')
                <span>{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Screenshot</label>
            <input class="form-control" name="image" type="file" id="formFile">
            @error('image')
                <span>{{$message}}</span>
            @enderror
        </div>

        @if(auth()->user()->is_admin)
        <div class="mb-3">
            <div class="form-floating">
                <textarea class="form-control" name="answer" style="height: 100px">{{old('answer',$ticket->answer)}}</textarea>
                <label for="floatingTextarea2">Answer</label>
              </div>
            @error('answer')
                <span>{{$message}}</span>
            @enderror
        </div>

        <select class="form-select" name="priority" aria-label="Default select example">

            <option value="1" @if($ticket->priority==1) selected @endif>Bassa</option>
            <option value="2" @if($ticket->priority==2) selected @endif>Media</option>
            <option value="3" @if($ticket->priority==3) selected @endif>Alta</option>
          </select>

          <br>
        <select class="form-select" name="status" aria-label="Default select example">

            <option value="1" @if($ticket->status==1) selected @endif>Aperto</option>
            <option value="2" @if($ticket->status==2) selected @endif>In Lavorazione</option>
            <option value="3" @if($ticket->status==3) selected @endif>Chiuso</option>
          </select>
          <br>

        @endif

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

</x-main>