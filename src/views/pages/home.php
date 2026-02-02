<div class="container mt-5">
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="card">
        <div class="card-body">
          <h1>{{ $message }}</h1>
          <div x-data="home">
            <p>Counter: <span x-text="count"></span></p>
            <button @click="increment" class="btn btn-primary">Increment</button>
            <button @click="decrement" class="btn btn-primary">Decrement</button>
            <a href="/login"><button class="btn btn-success">Login</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>