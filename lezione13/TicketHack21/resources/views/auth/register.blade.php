<x-main>
<form method="POST" action="/register">
    @csrf

    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{old('name')}}" >
        @error('name')
            <span>{{$message}}</span>
        @enderror
    </div>

    <div class="mb-3">
      <label  class="form-label">Email address</label>
      <input type="email" name="email" class="form-control" value="{{old('email')}}">
      @error('email')
        <span>{{$message}}</span>
      @enderror
    </div>
    <div class="mb-3">
      <label  class="form-label">Password</label>
      <input type="password" name="password" class="form-control" >
      @error('password')
        <span>{{$message}}</span>
      @enderror
    </div>

    <div class="mb-3">
        <label  class="form-label">Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control" >
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

  </form>
</x-main>