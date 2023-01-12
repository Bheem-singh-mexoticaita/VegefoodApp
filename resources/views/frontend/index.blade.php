<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Site</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Select Plane:</div>
     
                    <div class="card-body">
     
                        <div class="row">
                            @foreach($plans as $plan)
                                <div class="col-md-6">
                                    <div class="card mb-3">
                                      <div class="card-header"> 
                                            ${{ $plan->price }}/Mo
                                      </div>
                                      <div class="card-body">
                                        <h5 class="card-title">{{ $plan->name }}</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      
                                        <a href="{{ route('plans.show', $plan->slug) }}" class="btn btn-primary pull-right">Choose</a>
      
                                      </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
      
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>