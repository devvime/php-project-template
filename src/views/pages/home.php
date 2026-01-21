<h1>{{ $message }}</h1>
<div x-data="home">
    <p>Counter: <span x-text="count"></span></p>
    <button @click="increment">Increment</button>
    <button @click="decrement">Decrement</button>
</div>