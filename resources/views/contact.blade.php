@extends('master')
@section('title','- Contact')
@section('isContact')
  active
@endsection
@section('content')
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Contact
        <small>Leave us a message</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('projects.home') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">Contact</li>
      </ol>

        @if(session()->has('message'))
            @if(session()->get('message') == "success")
                <div class="alert alert-success alert-dismissible show" role="alert">
                    <strong>Success!</strong> Message Sent
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif(session()->get('message') == "error")
                <div class="alert alert-danger alert-dismissible show" role="alert">
                    <strong>Ooops!</strong> Could not Send Message
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        @endif

      <!-- Content Row -->
      <div class="row">
        <!-- Map Column -->
        <div class="col-lg-8 mb-4">
          <!-- Embedded Google Map -->
          <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;0.047636,37.650251&amp;spn=56.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe>
        </div>
        <!-- Contact Details Column -->
        <div class="col-lg-4 mb-4">
          <h3>Contact Details</h3>
          <p>
              P.O. Box 120-60200, Meru
            <br>
          </p>
          <p>
            <span class="fa fa-phone"></span>: 0709 241000
          </p>
          <p>
            <span class="fa fa-envelope-o"></span>:
            <a href="mailto:name@example.com">merucounty@meru.go.ke
            </a>
          </p>
          <p>
            <span class="fa fa-clock-o"></span>: Monday - Friday: 9:00 AM to 5:00 PM
          </p>
        </div>
      </div>
      <!-- /.row -->

      <!-- Contact Form -->
      <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
      <div class="row">
        <div class="col-lg-8 mb-4">
          <h3>Send us a Message</h3>
          <form name="sentMessage" id="contactForm" method="post" action="{{ route('message.save') }}">
              {{ csrf_field() }}
            <div class="control-group form-group">
              <div class="controls">
                <label for="sender_first_name">First Name:</label>
                <input type="text" class="form-control" name="sender_first_name" id="sender_first_name" required data-validation-required-message="Please enter your name.">
                <p class="help-block"></p>
                @if($errors->has('sender_first_name') )
                  <span class="text-danger">{{ $errors->first('sender_first_name') }}</span>
                @endif
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label for="sender_last_name">Last Name:</label>
                <input type="text" class="form-control" name="sender_last_name" id="sender_last_name" required data-validation-required-message="Please enter your name.">
                <p class="help-block"></p>
                @if($errors->has('sender_last_name') )
                  <span class="text-danger">{{ $errors->first('sender_last_name') }}</span>
                @endif
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label for="constituency">Constituency:</label>
                  <select class="form-control" name="sender_constituency" id="constituency">
                    <option disabled selected value> -- select an option -- </option>
                      @if('constituencies')
                          @foreach($constituencies as $constituency)
                              <option value="{{ $constituency->constituency_name }}">{{ $constituency->constituency_name }}</option>
                          @endforeach
                      @endif
                  </select>
                <p class="help-block"></p>
                @if($errors->has('constituency') )
                  <span class="text-danger">{{ $errors->first('constituency') }}</span>
                @endif
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label for="email">Email Address:</label>
                <input type="email" class="form-control" name="email" id="email" required data-validation-required-message="Please enter your email address.">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label for="message">Message:</label>
                <textarea rows="10" cols="100" class="form-control" name="message" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
              </div>
              @if($errors->has('message') )
                <span class="text-danger">{{ $errors->first('message') }}</span>
              @endif
            </div>
            <div id="success"></div>
            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Send Message</button>
          </form>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
  @endsection