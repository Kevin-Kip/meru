@extends('master')
@section('isHome')
    active
@endsection
@section('content')
    @include('slider')

    <section id="content">
        <div class="container">

            <section class="services">
                <div class="row">
                    <div class="col-md-12">
                        <div class="aligncenter"><h2 class="aligncenter">Some Flagship Projects</h2></div>
                    </div>
                </div>

                <div class="row">
                    @foreach($projects as $project)
                        <a href="{{ url('/projects') }}">
                            <div class="col-sm-4 info-blocks">
                                <div class="info-blocks-in">
                                    <h3>{{ $project->name }}</h3>
                                    <div class="line"></div>
                                    <p>In {{ $project->constituency_name }} constituency and is
                                        <strong>{{ $project->completion }} % completed.</strong></p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </section>
        </div>
    </section>
    <section class="dishes">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aligncenter">
                        <h2 class="aligncenter">Main Departments</h2>
                        These are some of the main project departments we focus on developing.
                    </div>
                    <br/>
                </div>
            </div>

            <div class="row service-v1 margin-bottom-40">
                @foreach($departments as $department)
                    <a href="{{ url('projects/category/'.$department->id) }}">
                        <div class="col-md-4 md-margin-bottom-40">
                            <div class="card small">
                                <div class="card-image">
                                    <img class="img-responsive" src="{{ asset($department->photo)}}" alt="">
                                    <span class="card-title">{{ $department->name }}</span>
                                </div>
                                <div class="card-content">
                                    <p>{{ $department->description }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
