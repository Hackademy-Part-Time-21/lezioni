<x-layout.main>


    <form method="POST" action="/login">
        @csrf

        <div class="mb-3">
          <label  class="form-label">Email address</label>
          <input type="email" class="form-control" name="email" value="{{old('email')}}" >
          @error('email')
            <span>{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
          <label  class="form-label">Password</label>
          <input type="password" class="form-control" name="password">
          @error('password')
          <span>{{$message}}</span>
        @enderror
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" >
            <label class="form-check-label" name="remember">Check me out</label>
          </div>

        <a href="/forgot-password">Recupera password</a>

          <br>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


</x-layout.main>