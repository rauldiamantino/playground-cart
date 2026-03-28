<h1>Product List</h1>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td><a href="/products/{{ $product->id }}">{{ $product->name }}</a></td>
                <td><a href="/products/{{ $product->id }}">{{ $product->price }}</a></td>

                <td>
                    <form action="/products/{{ $product->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<a href="/products/create">New Product</a>
