<x-layout>
    <form action="/register" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" name="name" class="form-control">
            @error('name')
                <span>{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control">
                @error('email')
                    <span>{{$message}}</span>
                @enderror
        </div>
        <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control">

        @error('password')
        <span>{{$message}}</span>
        @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password Confirmation</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-layout>