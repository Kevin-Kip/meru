<section id="banner">
    <!-- Slider -->
    <div id="main-slider" class="flexslider">
        <ul class="slides">
            @foreach($photos as $photo)
                <li>
                    <img style="max-height: 500px" src="{{ asset($photo->photo_path)}}" alt="" />
                </li>
            @endforeach
        </ul>
    </div>
    <!-- end slider -->
</section>