@extends('master')

@section('content')
    @include('slider')

    <section class="dishes">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aligncenter">
                        <h2 class="aligncenter">{{ $project[0]->project_name }}</h2>
                        <p>{{ $project[0]->project_description }}</p>
                        <p>Budget: <strong>{{ $project[0]->budget }}</strong></p>
                        <p>This projects is in {{ $project[0]->project_ward }} ward, {{ $project[0]->constituency_name }} Constituency and is due to be completed on {{ $project[0]->due_date }}.</p>
                        <p><strong>{{ $project[0]->completion }}% Completed</strong></p>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="{{ $project[0]->completion }}"
                                 aria-valuemin="0" aria-valuemax="100" style="width:{{$project[0]->completion}}%">
                                {{ $project[0]->completion }}%
                            </div>
                        </div>

                        <p>Contractor: <strong>{{ $project[0]->contractor }}</strong></p>
                    </div>
                    <br/>
                </div>
            </div>
        </div>
    </section>
@endsection