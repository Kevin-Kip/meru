@extends('finance.master')
@section('content')

    <div class="text-white">
        <button class="btn btn-warning" id="ongoingButton">
            <i class="fa fa-clock-o"></i>
            New Projects
        </button>
        <button class="btn btn-info" id="completedButton">
            <i class="fa fa-check"></i>
            Projects with Balance
        </button>
        <button class="btn btn-success" id="completedButton">
            <i class="fa fa-check"></i>
            Completed Projects
        </button>
    </div>
    <p></p>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Projects Table</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Budget (KSh.)</th>
                        <th>Completion</th>
                        <th>Contractor</th>
                        <th>Pay</th>
                    </tr>
                    </thead>
                    @if('projects')
                        <tbody>
                        @foreach($projects as $project)
                            <tr>
                                <td>{{ $project->project_name }}</td>
                                <td>
                                    @if($project->project_status == 0)
                                        New
                                    @elseif($project->project_status == 1)
                                        Ongoing
                                    @elseif($project->project_status == 2)
                                        Completed
                                    @else
                                        Unknown
                                    @endif
                                </td>
                                <td>{{ $project->budget }}</td>
                                <td>{{ $project->completion }}%</td>
                                <td>{{ $project->contractor }}</td>
                                <td><a class="btn btn-primary" href="{{ route('finance.pay', ['id'=>$project->project_id]) }}">Make Payment</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    @endif
                </table>
                {{ $projects->links() }}
            </div>
        </div>
    </div>
    <!-- Logout Modal-->
    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Make Payment</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ url('/sign-out') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>
@endsection
