<div class="row">
    <div class="col-lg-8">
        <!-- Example Bar Chart Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-bar-chart"></i> Projects Per Constituency</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-8 my-auto">
                        <canvas id="myBarChart" width="100" height="50"></canvas>
                    </div>
                    <div class="col-sm-4 text-center my-auto">
                        <div class="h4 mb-0 text-primary">{{ $projectcount }}</div>
                        <div class="small text-muted">Total Projects</div>
                        <hr>
                        <div class="h4 mb-0 text-success">{{ $completed }}</div>
                        <div class="small text-muted">Completed Projects</div>
                        <hr>
                        <div class="h4 mb-0 text-warning">{{ $ongoing }}</div>
                        <div class="small text-muted">Ongoing Projects</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <!-- Example Pie Chart Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-pie-chart"></i> Project Completion</div>
            <div class="card-body">
                <canvas id="myDoughnut" width="100%" height="100"></canvas>
            </div>
        </div>
    </div>
</div>