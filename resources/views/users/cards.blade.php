<!-- Icon Cards-->
<div class="row">
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-comments"></i>
                </div>
                @if('messagecount')
                    <div class="mr-5">{{ $messagecount }} Messages</div>
                @endif
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{ route('users.messages') }}">
                <span class="float-left">View Details</span>
                <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-list"></i>
                </div>
                @if('projectcount')
                    <div class="mr-5">{{ $projectcount }} Projects</div>
                @endif
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{ route('users.projects') }}">
                <span class="float-left">View Details</span>
                <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-shopping-cart"></i>
                </div>
                @if('usercount')
                    <div class="mr-5">{{ $usercount }} People</div>
                @endif
            </div>
            <p class="card-footer text-white clearfix small z-1">
                <span class="float-left">View Details</span>
                <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </p>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-support"></i>
                </div>
                @if('constituencycount')
                    <div class="mr-5">{{ $constituencycount }} Constituencies</div>
                @endif
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{ route('users.constituencies') }}">
                <span class="float-left">View Details</span>
                <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
        </div>
    </div>
</div>