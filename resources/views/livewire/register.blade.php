<div class="card offset-3 col-6">
    <div class="card-header">
      Register
    </div>
    <div class="card-body">
        <form wire:submit="storeUser">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input wire:model="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
              </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input wire:model="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              @error('email')
              <span class="text-danger">{{$message}}</span>
          @enderror
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input wire:model="password" type="password" class="form-control" id="exampleInputPassword1">
              @error('password')
              <span class="text-danger">{{$message}}</span>
          @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
          </form>
          <div class="mb-3">
            Already have an account? <a wire:navigate href="/login" class="btn btn-success btn-sm">Login</a> 
          </div>
    </div>
  </div>
