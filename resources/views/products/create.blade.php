<form action="/products" method="post">
    @csrf
    <label for="name">Product Name:</label>
    <input type="text" name="name" id="name">

    <label for="price">Price</label>
    <input type="text" name="price" id="price">

    <button type="submit">Create Product</button>
</form>
