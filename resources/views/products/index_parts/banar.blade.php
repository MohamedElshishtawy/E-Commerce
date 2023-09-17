<section class="banner spad">
        <div class=" container catigories">
            
            @empty($catigories)

                <div class="text-center">No Catigories</div>
            @else 
                @foreach ($catigories as $catigory)
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="banner__item">
                                <div class="banner__item__pic">
                                    <img src={{$catigory->image ? asset("img/".$catigory->image) : "img/catigories/no_img.jpg"}} alt="">
                                </div>
                                <div class="banner__item__text">
                                    <a href={{"shop_search"}}>{{$catigory->name}}</a>
                                    <a href="#">Shop now</a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                @endforeach
            @endempty
            
    </section>