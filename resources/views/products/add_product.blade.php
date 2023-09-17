<x-layout title="Process">
    <x-slot:more_css_links>
        <link rel="stylesheet" href={{asset("css/user/user-form.css")}} type="text/css">
        <link rel="stylesheet" href={{asset("css/products/options.css")}} type="text/css">
    </x-slot>
        <form action={{route('store_product')}} method="POST" enctype="multipart/form-data" class="grid justify-content-center ">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Add Product</h1>

            <div>
                <label for="name">NAME</label>
                <input type="text" class="" id="name" name="name" value={{old("name")}}>
                @error('name')
                <div class="text-danger text-xs mt-1 text-capitalize small">{{$message}}</div>
                @enderror
            </div>

            <div>
                <label for="description">DESCRIPTION</label>
                <input type="string" class="" id="description" name="description" value={{old("description")}}>
                @error('description')
                <div class="text-danger text-xs mt-1 text-capitalize small">{{$message}}</div>
                @enderror
            </div>

            <div>
                <label for="price">PRICE</label>
                <input type="number" class="" id="price" name="price" value={{old("price")}}><i class="fa fa-dollar"></i>
                @error('price')
                <div class="text-danger text-xs mt-1 text-capitalize small">{{$message}}</div>
                @enderror
            </div>

            <div>
                <label for="discound">DISCOUND</label>
                <input type="number" class="input-sm" id="discound" name="discound" value="{{old("discound")}}"> <i class="fa fa-percent"></i>
                @error('discound')
                <div class="text-danger text-xs mt-1 text-capitalize small">{{$message}}</div>
                @enderror
            </div>

            <div>
                <label for="count">COUNT</label>
                <input type="number" class="" id="count" name="count" value={{old("count")}}>
                @error('count')
                <div class="text-danger text-xs mt-1 text-capitalize small">{{$message}}</div>
                @enderror
            </div>

            <div>
                <label for="catigory">CATIGORY</label>
                <select name="catigory" id="catigory" value={{old("catigory")}}>
                    @empty($catigories)
                        <option value="0">No CATIGORY</option>
                    @else
                        @foreach ($catigories as $catigory)
                            <option value={{$catigory->id}}>{{$catigory->name}}</option>
                        @endforeach
                    @endempty
                </select>
                @error('catigory')
                <div class="text-danger text-xs mt-1 text-capitalize small">{{$message}}</div>
                @enderror
            </div>
            
            <hr>

            <div>
                <input type="checkbox" name="colors" id="colors"><label for="colors" style="display: inline">COLORS</label>
                <table class="table-color">
                    <thead>
                        <tr>
                            <th>INPUT</th>
                            <th>COUNT</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td id="addColor"><i class="fa fa-plus fa-lg"></i></td>
                            <td id="removeColor"><i class="fa fa-x fa-lg" ></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <hr>
            <div>
                <input type="checkbox" name="sizes" id="sizes"><label for="sizes" style="display: inline">SIZES</label>
                <table class="table-size">
                    <thead>
                        <tr>
                            <th>INPUT</th>
                            <th>COUNT</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td id="addSize"><i class="fa fa-plus fa-lg"></i></td>
                            <td id="removeSize"><i class="fa fa-x fa-lg" ></i></td>
                        </tr>
                    </tbody>
                </table>
                <hr>
            </div>

            <div class="options">
                
                
            </div>
            
            <div>
                <label for="images">IMAGES</label>
                <input type="file" name="images[]" id="images" multiple >
                @error('images')
                <div class="text-danger text-xs mt-1 text-capitalize small">{{$message}}</div>
                @enderror
            </div>


            <button class="btn btn-danger m-10" type="submit">SAVE</button>


        </form>
</x-layout>