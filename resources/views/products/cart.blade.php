<x-layout>
    <x-slot:more_css_links></x-slot>
    <style>
        .table td{
            vertical-align: center !important;
        }
    </style>
    <h1 class="text-center">My Cart</h1>
    
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-md-8 col-lg-8 col-xl-8 mx-auto">
                <table class="table border  table-hover text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Count</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody >
                        @empty($products)
                            <tr>
                                <td colspan="5" class="text-center">No Data</td>
                            </tr>
                        @else
                            @php($count=0)
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{++$count}}</td>
                                    <td><img src={{asset("img/". ($product->product->images[0]->link ?? "products/none.jpg"))}} style="width: 9em"></td>
                                    <td>{{$product->product->name}}</td>
                                    <td>{{$product->count}}</td>
                                    <td>
                                        <div id="delete" class="btn btn-danger mx-auto" style="padding: 3px 9px">
                                            <i class="fa fa-x"></i>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endempty
                        <tr>
                            <td colspan="5" style="text-align: center;">
                                <a href={{route("send_in_mail")}} class="btn btn-success">
                                    <i class="fa-solid fa-hand-peace"></i> <span>Buy</span>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-layout>