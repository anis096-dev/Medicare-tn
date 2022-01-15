<div class=" mt-3">
    @if (count($images)) 
        @foreach ($images as $item)
        <div class=" inline-flex">
            <img width="400px" src={{ url('storage/images/'. $item->image)}} /> <br/><br/>
        </div>  
        @endforeach
    @else
        <p> No additional photos for this user </p>
    @endif
</div>
