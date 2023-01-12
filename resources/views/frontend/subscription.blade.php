<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
     <style>
        .alert.parsley {
            margin-top: 5px;
            margin-bottom: 0px;
            padding: 10px 15px 10px 15px;
        }
        .check .alert {
            margin-top: 20px;
        }
        .credit-card-box .panel-title {
            display: inline;
            font-weight: bold;
        }
        .credit-card-box .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 100%;
        }
        .credit-card-box .display-tr {
            display: table-row;
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
</head>
<body id="app-layout">
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1 class="text-primary text-center">
          <strong>Laravel 8 Stripe Subscription Example - CodeSolutionStuff</strong>
        </h1>
    </div>
</div>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default credit-card-box">
        <div class="panel-heading display-table" >
            <div class="row display-tr" >
                <strong>Laravel 8 Stripe Subscription Example - CodeSolutionStuff</strong>
            </div>                    
        </div>
        <div class="panel-body">
            <div class="col-md-12">
              {!! Form::open(['url' => route('subscription.create'), 'data-parsley-validate', 'id' => 'payment-form']) !!}
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ $message }}</strong>
                </div>
                @endif
               
                <div class="form-group" id="userName-group">
                    {!! Form::label(null, 'User Name:') !!}
                    {!! Form::text('userName', null, ['class'=> 'form-control','required'=> 'required','data-parsley-trigger'=> 'change focusout', 'data-parsley-class-handler'=> '#userName-group']) !!}
                </div>
                <div class="form-group" id="EmailAddress-group">
                    {!! Form::label(null, 'Email Address:') !!}
                    {!! Form::email('EmailAddress', null, ['class'=> 'form-control','required'=> 'required', 'data-parsley-trigger'=> 'change focusout','data-parsley-class-handler' => '#EmailAddress-group']) !!}
                </div>
                <div class="form-group" id="password-group">
                    {!! Form::label(null, 'Enter Password:') !!}
                   {!! Form::password('password', ['class' => 'form-control', 'required' => 'required','data-parsley-trigger'=> 'change focusout',  'data-parsley-class-handler' => '#EmailAddress-group']) !!}
                </div>
                <div class="form-group" id="Product-group">
                    {!! Form::label(null, 'Product:') !!}
                    {!! Form::text('ProductName',$plan->name, [ 'class' => 'form-control','required'=> 'required', 'data-parsley-trigger'=> 'change focusout','data-parsley-class-handler'=> '#Product-group','readonly'=>true ]) !!}
                </div>
                <div class="form-group" id="ProductPrice-group">
                    {!! Form::label(null, 'Product Price:') !!}
                    {!! Form::text('ProductCost',number_format($plan->price, 2) , [ 'class'=> 'form-control', 'required'=> 'required', 'data-parsley-trigger'=> 'change focusout','data-parsley-class-handler'=> '#ProductPrice-group', 'readonly'=>true ]) !!}
                </div>
                </div>
                
                  <div class="form-group">
                      {!! Form::submit('Place order!', ['class' => 'btn btn-lg btn-block btn-primary btn-order', 'id' => 'submitBtn', 'style' => 'margin-bottom: 10px;']) !!}
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" name="plan" id="plan" value="{{ $plan->id }}">
                        <span class="payment-errors" style="color: red;margin-top:10px;"></span>
                    </div>
                  </div>
                  
              {!! Form::close() !!}
            </div>
        </div>
    </div>
    
  </div>
</div>
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe('{{ env('STRIPE_KEY') }}')
      
        const elements = stripe.elements()
        const cardElement = elements.create('card')
      
        cardElement.mount('#card-element')
      
        const form = document.getElementById('payment-form')
        const cardBtn = document.getElementById('card-button')
        const cardHolderName = document.getElementById('card-holder-name')
      
        form.addEventListener('submit', async (e) => {
            e.preventDefault()
      
            cardBtn.disabled = true
            const { setupIntent, error } = await stripe.confirmCardSetup(
                cardBtn.dataset.secret, {
                    payment_method: {
                        card: cardElement,
                        billing_details: {
                            name: cardHolderName.value
                        }   
                    }
                }
            )
      
            if(error) {
                cardBtn.disable = false
            } else {
                let token = document.createElement('input')
                token.setAttribute('type', 'hidden')
                token.setAttribute('name', 'token')
                token.setAttribute('value', setupIntent.payment_method)
                form.appendChild(token)
                form.submit();
            }
        })
    </script>
</body>
</html>