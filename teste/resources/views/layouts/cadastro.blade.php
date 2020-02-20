
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
     {{-- <script type="text/javascript">
        $(document).ready(function(){
           if (jQuery) {
             // jQuery is loaded
             alert("Yeah!");
           } else {
             // jQuery is not loaded
             alert("Doesn't Work");
           }
        });
      </script>  --}}
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('home') }}">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('cadastro/create') }}">{{ __('Cadastro') }}</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
<script>

$(document).ready(function(){
    var count = 1;
    var x = 1;
    dynamic_field(count);

    function dynamic_field(number)
    {

     html = '<tr>';
     html += '<td><input type="text" class="phone" name="phone_number'+x+'" id="phone_number'+x+'" class="form-control"  onkeyup="mascara( this, mtel );" maxlength="15" /></td>';
     x++;
           if(number > 1)
           {
               if (number <= 6) {
                    html += '<td><button type="button"  name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
                    $('#tbody').append(html);
                } else {
                    alert('limite alcançado');
                }
           }
           else
           {
               html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
               $('#tbody').html(html);
           }
    }

    $(document).on('click', '#add', function(){
     count++;
     dynamic_field(count);
    });

    $(document).on('click', '.remove', function(){
     count--;
     $(this).closest("tr").remove();
    });


   });

   function buscarCep() {
    const zipCode = document.querySelector("#zipcode")
    const address = document.querySelector("#address")
    const neighborhood = document.querySelector("#neighborhood")
    const city = document.querySelector("#city")
    const state = document.querySelector("#state")
    zipCode.oninput = () => {
    if (zipCode.value.length === 8) {
    address.value = ""
    neighborhood.value = ""
    city.value = ""
    state.value = ""
    fetch(`https://viacep.com.br/ws/${zipCode.value}/json/`)
    .then(response => response.json())
    .then(data => {
    address.value = data.logradouro
    neighborhood.value = data.bairro
    city.value = data.localidade
    state.value = data.uf
         });
       }
    }
}

function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function mtel(v){
    v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}


$('#cadastro').click( function(e)
{
   e.preventDefault()
   const csrf = $('meta[name="csrf-token"]').attr('content');
   phone_number=[];
   for (i= 0; i < document.getElementsByClassName('phone').length; i++) {
    $date = document.getElementById('phone_number'+i).value;
    phone_number.push($date);
   }
   console.log(phone_number);
   $.ajax({
        url: '{{url("cadastro")}}',
        type: 'POST',
        data: {
        'name'         : $('#name').val(),
        'last_name'    : $('#last_name').val(),
        'email'        : $('#email').val(),
        'date_birth'   : $('#date_birth').val(),
        'zipcode'      : $('#zipcode').val(),
        'address'      : $('#address').val(),
        'number'       : $('#number').val(),
        'complement'   : $('#complement').val(),
        'neighborhood' : $('#neighborhood').val(),
        'city'         : $('#city').val(),
        'state'        : $('#state').val(),
        'phone_number' : phone_number,
        '_token': csrf
    },
    dataType: 'json',
    success: function( response ) {
    },
    error: function( response ) {
            }
        })
})

</script>



