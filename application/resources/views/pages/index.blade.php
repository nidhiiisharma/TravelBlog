@extends('layouts.app')

@section('content')
<br>
<div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-left:-2%;">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="item active">
        <img src="images/1.jpg" style="width:100%;">
      </div>
      <div class="item">
        <img src="images/2.jpg" style="width:100%;">
      </div>
      <div class="item">
        <img src="images/3.jpg" style="width:100%;">
      </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div> 
<br><br>
<div class="container">
  <div class="row">
    <div class="col-md-4">
      <img class="rounded-circle" style="margin-left:29%;border-radius:100%;" src="images/airplane.png" alt="Generic placeholder image" width="150" height="150">
        <center><h2 class="centered">Air Ticketing</h2></center>
          <p style="text-align:center;">Donec sed odio dui. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
    </div>
    <div class="col-md-4">
      <img class="rounded-circle" style="margin-left:29%;border-radius:100%;" src="images/cruise.jpg" alt="Generic placeholder image" width="150" height="150">
        <center><h2 class="centered">Cruises</h2></center>
          <p style="text-align:center;">Donec sed odio dui. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
    </div>
    <div class="col-md-4">
      <img class="rounded-circle" style="margin-left:29%;border-radius:100%;" src="images/train.png" alt="Generic placeholder image" width="150" height="150">
        <center><h2 class="centered">Trains</h2></center>
          <p style="text-align:center;">Donec sed odio dui. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
      </div>
    </div>
</div>
<br>
<hr class="featurette-divider">
<div class="row featurette">
  <div class="col-md-7">
    <h2 class="featurette-heading">Write down your experience</h2>
      <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
      <a href="/posts/create" class="btn btn-primary">Create Post</a>
    </div>
    <div class="col-md-5">
      <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="400" height="400" src="images/image.jpg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>
    </div>
  </div>
  <br>
  <hr class="featurette-divider">
    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Explore new places</h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        <p><a class="btn btn-primary" href="/destinations" role="button">View details &raquo;</a></p>
      </div>
      <div class="col-md-5 order-md-1">
        <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="400" height="400" src="images/image2.jpg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>
      </div>
    </div>
  <br><br>
@endsection

