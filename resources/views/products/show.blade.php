<div>
    <h1>{{ $product->name }}</h1>
    <p>Price: {{ $product->price }}</p>
    <a href="/products/{{ $product->id }}/edit">Edit</a>
</div>

<a href="/products">All products</a>
