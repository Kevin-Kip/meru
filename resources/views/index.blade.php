@extends('master')

@section('content')
    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
            {{--TODO Fix this--}}
          <div class="carousel-item active" style="background-image: url('{{ asset($photos[2]->name) }}')">
            <div class="carousel-caption d-none d-md-block">
              <h3>First Slide</h3>
              <p>This is a description for the first slide.</p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('{{ asset($photos[3]->name) }}')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Second Slide</h3>
              <p>This is a description for the second slide.</p>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('{{ asset($photos[4]->name) }}')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Third Slide</h3>
              <p>This is a description for the third slide.</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>

    <!-- Page Content -->
    <div class="container">

      <h1 class="my-4">Some of Our Projects</h1>

      <!-- Marketing Icons Section -->
      <div class="row">
        @if('projects')
            @foreach($projects as $project)
                <div class="col-lg-4 mb-4">
                  <div class="card h-100">
                    <h4 class="card-header">{{ $project->name }}</h4>
                    <div class="card-body">
                        <p class="card-text">{{ $project->description }}</p>
                        <p class="card-text">{{ $project->budget }}</p>
                        <p class="card-text">{{ $project->completion }}% Done</p>
                    </div>
                    <div class="card-footer">
                      <a href="{{ route('projects.all') }}" class="btn btn-primary">Learn More</a>
                    </div>
                  </div>
                </div>
              @endforeach
         @endif
      </div>
      <!-- /.row -->

      <!-- Portfolio Section -->
      <h2>Main Categories</h2>

      <div class="row">
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
              {{--TODO add max height--}}
            <p><img class="card-img-top" src="{{ asset('/storage/uploads/Kevin/espresso_cup.png') }}" alt=""></p>
            <div class="card-body">
              <h4 class="card-title">
                <p>Water and Sanitation</p>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <p><img class="card-img-top" src="{{ asset('/storage/uploads/Kevin/espresso_cup.png') }}" alt=""></p>
            <div class="card-body">
              <h4 class="card-title">
                <p>Roads</p>
              </h4>
                <p class="card-text">Investment in the road network in the country has been scaled up to build more highways, urban roads and also to extend rural roads to where they are needed to open up areas to economic activity, trade and commerce.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <p><img class="card-img-top" src="{{ asset('/storage/uploads/Kevin/espresso_cup.png') }}" alt=""></p>
            <div class="card-body">
              <h4 class="card-title">
                <p>Agriculture</p>
              </h4>
              <p class="card-text">The government’s efforts to make food cheap and available to all Kenyans are bearing fruit with various initiatives aimed at supporting farming, livestock rearing and fish production initiated. More farmers are accessing subsidized inputs to lower their cost of production and boost earnings.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <p><img class="card-img-top" src="{{ asset('/storage/uploads/Kevin/espresso_cup.png') }}" alt=""></p>
            <div class="card-body">
              <h4 class="card-title">
                <p>ICT</p>
              </h4>
              <p class="card-text">Information, Communication and Technology is a major priority for the Kenya government as it seeks to transform the country into a knowledge-based economy. Digital Literacy Programme, KONZA Technopolis, Ajira and Presidential Digital Talent Programme are key programmes under ICT.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <p><img class="card-img-top" src="{{ asset('/storage/uploads/Kevin/espresso_cup.png') }}" alt=""></p>
            <div class="card-body">
              <h4 class="card-title">
                <p>Health</p>
              </h4>
              <p class="card-text">The national government has invested heavily to make access to health care a reality for millions of Kenyans at affordable or no cost. The Government distributed World Class medical equipment to all counties, introduced a free maternity health program and expanded National Hospital Insurance Fund.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <p><img class="card-img-top" src="{{ asset('/storage/uploads/Kevin/espresso_cup.png') }}" alt=""></p>
            <div class="card-body">
              <h4 class="card-title">
                <p>Education</p>
              </h4>
              <p class="card-text">Kenya is the 7th largest funder of Education in the world. The Education sector continues to be the largest recipient of government budget totalling over Ksh.300 billion annually. The government has made interventions at every level of education to increase access to quality education to Kenyans.</p>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div>
@endsection
