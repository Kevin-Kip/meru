@extends('contractor.master')
@section('content')

        <div class="text-white">
            <button class="btn btn-primary" id="allProjects">
                <i class="fa fa-list"></i>
                All Projects
            </button>
            <button class="btn btn-warning" id="ongoingButton">
                <i class="fa fa-clock-o"></i>
                Ongoing Projects
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
                    <table class="table table-bordered table-condensed" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Constituency</th>
                            <th>Budget</th>
                            <th>Completion</th>
                            <th>Due Date</th>
                        </tr>
                        </thead>
                        <tbody id="reportBody">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
@section('customScripts')
    <script>
        let reportBody = $('#reportBody');
        $('#allProjects').on('click', function () {
            reportBody.empty();
            $.ajax({
                url: '/api/projects',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    for (let i=0;i<data.length;i++) {
                        reportBody.append("<tr><td>"+data[i].project_name+"</td><td>"+data[i].project_category+"</td><td>"+data[i].project_constituency+"</td><td>"+data[i].budget+"</td><td>"+data[i].completion+"%</td><td>"+data[i].due_date+"</td></tr>");
                    }
                    reportBody.append("<tr><td><a href='/reports/download' class='btn btn-primary'>Download</a></td></tr>")
                },
                error: function () {
                    alert('Error! Unable to fetch projects')
                }
            });
        });

        $('#ongoingButton').on('click', function () {
            reportBody.empty();
           $.ajax({
              url: '/api/ongoing',
              method: 'GET',
              dataType: 'json',
              success: function (data) {
                  for (let i=0;i<data.length;i++) {
                      reportBody.append("<tr><td>"+data[i].project_name+"</td><td>"+data[i].project_category+"</td><td>"+data[i].project_constituency+"</td><td>"+data[i].budget+"</td><td>"+data[i].completion+"%</td><td>"+data[i].due_date+"</td></tr>");
                  }
                  reportBody.append("<tr><td><a href='/reports/download/ongoing' class='btn btn-primary'>Download</a></td></tr>")
              },
               error: function () {
                   alert('Error! Unable to fetch projects')
               }
           });
        });

        $('#completedButton').on('click', function () {
            reportBody.empty();
            $.ajax({
                url: '/api/completed',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    for (let i=0;i<data.length;i++) {
                        reportBody.append("<tr><td>"+data[i].project_name+"</td><td>"+data[i].project_category+"</td><td>"+data[i].project_constituency+"</td><td>"+data[i].budget+"</td><td>"+data[i].completion+"%</td><td>"+data[i].due_date+"</td></tr>");
                    }
                    reportBody.append("<tr><td><a href='/reports/download/completed' class='btn btn-primary'>Download</a></td></tr>")
                },
                error: function () {
                    alert('Error! Unable to fetch projects')
                }
            });
        });

    </script>
@endsection