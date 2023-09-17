<x-layout>
    <x-slot:more_css_links>
        <link rel="stylesheet" href={{asset("css/user/user-form.css")}} type="text/css">
    </x-slot>
        <form action={{route('edit_product', ["id" => $product->id])}} method="POST" enctype="multipart/form-data" class="grid justify-content-center ">
            @csrf
            @method("PUT")
            <h1 class="h3 mb-3 fw-normal">Edit Product</h1>

            <div>
                <label for="name">NAME</label>
                <input type="text" class="" id="name" name="name" value={{$product->name}}>
                @error('name')
                <div class="text-danger text-xs mt-1 text-capitalize small">{{$message}}</div>
                @enderror
            </div>

            <div>
                <label for="description">DESCRIPTION</label>
                <input type="string" class="" id="description" name="description" value={{$product->description}}>
                @error('description')
                <div class="text-danger text-xs mt-1 text-capitalize small">{{$message}}</div>
                @enderror
            </div>

            <div>
                <label for="price">PRICE</label>
                <input type="number" class="" id="price" name="price" value={{$product->price}}><i class="fa fa-dollar"></i>
                @error('price')
                <div class="text-danger text-xs mt-1 text-capitalize small">{{$message}}</div>
                @enderror
            </div>


            <div>
                <label for="catigory">CATIGORY</label>
                <select name="catigory" id="catigory" value={{$product->catigory}}>
                    @empty($catigories)
                        <option value="0">No CATIGORY</option>
                    @else
                        @foreach ($catigories as $catigory)   
                            <option value={{$catigory->id}} @selected($catigory->id == $product->catigory)>{{$catigory->name}}</option>
                        @endforeach
                    @endempty
                </select>
                @error('catigory')
                <div class="text-danger text-xs mt-1 text-capitalize small">{{$message}}</div>
                @enderror
            </div>

            <div>
                <label for="discound">DISCOUND</label>
                <input type="number" class="input-sm" id="discound" name="discound" value="{{$product->discound}}"> <i class="fa fa-percent"></i>
                @error('discound')
                <div class="text-danger text-xs mt-1 text-capitalize small">{{$message}}</div>
                @enderror
            </div>

            <div>
                <label for="count">COUNT</label>
                <input type="number" class="" id="count" name="count" value={{$product->count}}>
                @error('count')
                <div class="text-danger text-xs mt-1 text-capitalize small">{{$message}}</div>
                @enderror
            </div>
    
            <div>
                <label for="images">IMAGES</label>
                <input type="file" name="images[]" id="images" multiple >
                @error('images')
                <div class="text-danger text-xs mt-1 text-capitalize small">{{$message}}</div>
                @enderror
                @empty($images)
                    <div>No Images For This Product</div>  
                @else 
                    @foreach ($images as $image)
                        <img src={{asset("storage/".$image->link)}} alt="" width="150">
                    @endforeach
                @endempty
            </div>
            

            <button class="btn btn-danger m-10" type="submit">SAVE</button>


        </form>
</x-layout>