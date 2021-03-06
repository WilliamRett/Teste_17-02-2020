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
<div class="container">
<div class="table-responsive">
    <form method="post" id="phone_form">
     <span id="result"></span>
     <table class="table table-bordered table-striped" id="user_table">
   <thead>
    <tr>
        <th width="10%" style="text-align:center">Cep</th>
        <th width="20%" style="text-align:center">Logradouro</th>
        <th width="10%" style="text-align:center">complemento</th>
        <th width="15%" style="text-align:center">bairro</th>
        <th width="15%" style="text-align:center">localidade</th>
        <th width="10%" style="text-align:center">uf</th>
        <th width="30%" style="text-align:center">Ação</th>
    </tr>
   </thead>
   <tbody id="tbody">

   </tbody>
   <tfoot>
    <tr>
    <td colspan="6" align="right">&nbsp;</td>
    <td>
      @csrf
      <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" />
     </td>
    </tr>
   </tfoot>
</table>
    </form>
</div>
</div>
</main>
</div>
</body>
</html>
<script>
$(document).ready(function(){
var count = 1;
dynamic_field(count);

function dynamic_field(number)
{
       html = '<tr>';
       html += '<td><input type="text" name="cep[]" class="form-control" /></td>';
       html += '<td><input type="text" name="logradouro[]" class="form-control" /></td>';
       html += '<td><input type="text" name="complemento[]" class="form-control"/></td>';
       html += '<td><input type="text" name="bairro[]" class="form-control" /></td>';
       html += '<td><input type="text" name="localidade[]" class="form-control" /></td>';
       html += '<td><input type="text" name="uf[]" class="form-control" /></td>';
       if(number > 1)
       {
            if (number <= 6) {
                html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
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

// $('#phone_form').on('submit', function(event){
//        event.preventDefault();
//        $.ajax({
//            url:'{{ route("cadastro.insert") }}',
//            method:'post',
//            data:$(this).serialize(),
//            dataType:'json',
//            beforeSend:function(){
//                $('#save').attr('disabled','disabled');
//            },
//            success:function(data)
//            {
//                if(data.error)
//                {
//                    var error_html = '';
//                    for(var count = 0; count < data.error.length; count++)
//                    {
//                        error_html += '<p>'+data.error[count]+'</p>';
//                    }
//                    $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
//                }
//                else
//                {
//                    dynamic_field(1);
//                    $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
//                }
//                $('#save').attr('disabled', false);
//            }
//        })
// });

});
</script>

