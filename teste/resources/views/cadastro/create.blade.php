
@extends('layouts.cadastro')

@section('content')
<div class="container">
    <form action="127.0.0.0 /cadastro" method="POST">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
    <div class="row" >
        <div class="col-8" style="padding: 15px;">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <input id="name" class="form-control" type="text" name="name">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="last_name">SobreNome</label>
                        <input id="last_name" class="form-control" type="text" name="last_name">
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" class="form-control" type="email" name="email">
                    </div>
                </div>
                    <div class="col-6">
                    <div class="form-group">
                        <label for="date_birth">Data de Nascimento</label>
                         <input id="date_birth" class="form-control" type="date" name="">
                    </div>
                </div>
                </div>
            <div class="row">
            <div class="col-2">
                <div class="form-group">
                    <label for="zipcode">cep</label>
                    <input id="zipcode" class="form-control" type="text" name="zipcode"  onkeyup="buscarCep()">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="address">endereço</label>
                    <input id="address" class="form-control" type="text" name="address">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="number">numero</label>
                    <input id="number" class="form-control" type="text" name="number">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="complement">complemento</label>
                    <input id="complement" class="form-control" type="text" name="complement">
                </div>
            </div>
            </div>
        <div class="row">
            <div class="col-2">
                <div class="form-group">
                    <label for="neighborhood">bairro</label>
                    <input id="neighborhood" class="form-control" type="text" name="neighborhood">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="city">cidade</label>
                    <input id="city" class="form-control" type="text" name="city">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="state">estado</label>
                    <input id="state" class="form-control" type="text" name="state">
                </div>
            </div>
        </div>
    </div>
        <div class="col-4">
                    <table class="table table-bordered table-striped" id="user_table">
                        <thead>
                        <tr>
                            <th width="35%">Telefone</th>
                            <th width="30%">Ação</th>
                        </tr>
                        </thead>
                        <tbody id="tbody">

                        </tbody>
                        <tfoot>
                        <tr>
                        <td colspan="1" align="right">&nbsp;</td>

                        </tr>
                        </tfoot>
                    </table>
        </div>
    </div>
    <div class="row">
        @csrf
        <button class="btn btn-primary" type="button" id="cadastro" name="cadastro">Cadastro</button>
    </div>
    </form> {{--form--}}
</div>   {{--container--}}

@endsection





