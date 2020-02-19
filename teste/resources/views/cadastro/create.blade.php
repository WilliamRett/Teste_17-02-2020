@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row" >     
            <div class="col">
                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <input id="name" class="form-control" type="text" name="name">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="last_name">SobreNome</label>
                        <input id="last_name" class="form-control" type="text" name="last_name">
                    </div>
                </div>
                    <div class="col">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" class="form-control" type="email" name="email">
                    </div>
                </div>
                    <div class="col">
                    <div class="form-group">
                        <label for="date_birth">Data de Nascimento</label>
                         <input id="date_birth" class="form-control" type="date" name="">
                    </div>
                </div>            
            </div>

        
    <div class="row" >    
    <div class="col-10">
        <div class="row">
            <div class="col-2">
                <div class="form-group">
                    <label for="zipcode">cep</label>
                    <input id="zipcode" class="form-control" type="text" name="zipcode">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="zipcode">endereço</label>
                    <input id="zipcode" class="form-control" type="text" name="zipcode">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="district">numero</label>
                    <input id="district" class="form-control" type="text" name="district">
                </div>
            </div>    
            <div class="col-2">
                <div class="form-group">
                    <label for="district">complemento</label>
                    <input id="district" class="form-control" type="text" name="district">
                </div>
            </div>   
        </div>
        <div class="row">
            <div class="col-2">
                <div class="form-group">
                    <label for="zipcode">bairro</label>
                    <input id="zipcode" class="form-control" type="text" name="zipcode">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="zipcode">cidade</label>
                    <input id="zipcode" class="form-control" type="text" name="zipcode">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="district">estado</label>
                    <input id="district" class="form-control" type="text" name="district">
                </div>
            </div>      
        </div>
    </div> 
    <div class="col-2" style="margin-top: 30px;">
        <button class="btn btn-primary" type="button" id="btn_address" name="btn_address">add address</button>
    </div>  
    </div> 
    <div class="row">
        <div class="col-2">
            <div class="form-group">
                <label for="zipcode">telefone</label>
                <input id="zipcode" class="form-control" type="text" name="zipcode">
            </div>
        </div>
        <div class="col-2" style="margin-top: 30px;">
            <button class="btn btn-primary" type="button" id="btn_phone" name="btn_phone">add phone</button>
        </div>
    
    </div>
    
</div>
       
@endsection
