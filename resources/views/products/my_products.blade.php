<x-layout>
    <x-slot:more_css_links>

    </x-slot>
    <h2 class="text-center">My Products</h2>
    <table class="table">
        <tr>
            <th>Num</th>
            <th>Name</th>
            <th>Count</th>
            <th>Catigory</th>
            <th>Inserted Date</th>
            <th>Options</th>
        </tr>
        @empty($products)
            <tr>
                <td class="text-center" colspan="5">No Products <a href={{route("add_product")}}>Add Product</a></td>
            </tr>
        @else 
            @php($x=0)
            @foreach ($products as $product)
                <tr>
                    <td>{{++$x}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->count}}</td>
                    <td>{{$product->catigory}}</td>
                    <td>{{$product->created_at}}</td>
                    <td style="display:flex;  gap: 5px">
                        <a href={{route("edit_product_page", ["id"=>$product->id])}} class="btn btn-primary btn-sm"><i class="fa fa-pen-to-square"></i> Edit</a>
                        <form action={{route("delete_product", ["id"=>$product->id])}} method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-can"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endempty

    </table>
</x-layout>