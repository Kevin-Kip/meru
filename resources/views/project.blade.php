@extends('master')

@section('content')
    @include('slider')

    <section class="dishes">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aligncenter">
                        <h2 class="aligncenter">{{ $project->name }}</h2>
                        <p>{{ $project->description }}</p>
                        <p>Budget: <strong>{{ $project->budget }}</strong></p>
                        <p>This projects is in {{ $project->ward }} ward, {{ $project->constituency_id }} Constituency and is due to be completed on {{ $project->due_date }}.</p>
                        <p><strong>{{ $project->completion }}% Completed</strong></p>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="{{ $project->completion }}"
                                 aria-valuemin="0" aria-valuemax="100" style="width:{{$project->completion}}%">
                                {{ $project->completion }}%
                            </div>
                        </div>

                        <p>Contractor: <strong>{{ $project->contractor }}</strong></p>
                    </div>
                    <br/>
                </div>
            </div>
        </div>
    </section>
@endsection