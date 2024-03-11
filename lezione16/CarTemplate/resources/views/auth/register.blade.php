
<x-main>
  <div class="row">
    <div class="col-12">
    <form action="{{route('register')}}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="name" name="name" value="{{old('name')}}" class="form-control">
              @error('name')
                  <span class="text-danger">{{$message}}</span>
              @enderror
          </div>

        <div class="mb-3">
          <label class="form-label">Email address</label>
          <input type="email" name="email" value="{{old('email')}}" class="form-control">
            @error('email')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
          <label  class="form-label">Password</label>
          <input type="password" name="password" class="form-control" >
          @error('password')
              <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Password Confirmation</label>
            <input type="password"  name="password_confirmation" class="form-control" >
          </div>

        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" name="remember" >
          <label class="form-check-label" >Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</x-main>