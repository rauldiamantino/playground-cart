<form action="/products/{{ $product->id }}" method="post">
    @csrf
    @method('put')
    <label for="name">Product Name:</label>
    <input type="text" name="name" id="name" value="{{ $product->name }}">

    <label for="price">Price</label>
    <input type="text" name="price" id="price" value="{{ $product->price }}">

    <button type="submit">Update Product</button>
</form>

<a href="/products">All products</a>
