<?php

namespace App\Http\Controllers;

use App\Cadastro;
use App\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CadastroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cadastros = Cadastro::all();
        return view('cadastro.index')->with(['cadastros'=>$cadastros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cadastro.teste');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name'                     => 'required|string' ,
            'last_name'                => 'required|string' ,
            'email'                    => 'required|email'  ,
            'date_birth'               => 'required|date'   ,
            'phone'                    => 'required|array'  ,
            'phone.*.number'             => 'required|string' ,
            'address'                  => 'required|array  ',
            'address.zipcode'          => 'required|string' ,
            'address.*.address'        => 'required|string' ,
            'address.*.district'       => 'required|string' ,
            'address.*.state'          => 'required|string' ,
            'address.*.city'           => 'required|string' ,
            'address.*.complement'     => 'nullable|string' ,
            'address.*.number_address' => 'required|string' ,
        ]);
        $cadastro = new Cadastro();
        $cadastro->fill($validate);
        $cadastro->save();
        foreach($validate['address'] as $address){
            $address['cadastro_id'] = $cadastro->id;
            $addressCount=DB::table('address')->where('cadastro_id',$cadastro->id)->count();
            if ($addressCount<=6) {
                //Address::create($address);
            }
        }
        foreach ($validate['phone'] as $phone) {
            $phone['cadastro_id'] = $cadastro->id;
            $phoneCount=DB::table('phones')->where('cadastro_id',$cadastro->id)->count();
            if ($phoneCount<=6) {
               //Phone::create($phone);
            }
            
        }

        return $cadastro->load('Phones')->load('Address');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cadastro  $cadastro
     * @return \Illuminate\Http\Response
     */
    public function show(Cadastro $cadastro)
    {
        return $cadastro;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cadastro  $cadastro
     * @return \Illuminate\Http\Response
     */
    public function edit(Cadastro $cadastro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cadastro  $cadastro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cadastro $cadastro)
    {
        $validatedData = $request->validate([
            'name'                     => 'required|string' ,
            'last_name'                => 'required|string' ,
            'email'                    => 'required|email'  ,
            'date_birth'               => 'required|date'   ,
            'phone'                    => 'required|array'  ,
            'phone.*.number'             => 'required|string' ,
            'address'                  => 'required|array  ',
            'address.zipcode'          => 'required|string' ,
            'address.*.address'        => 'required|string' ,
            'address.*.district'       => 'required|string' ,
            'address.*.state'          => 'required|string' ,
            'address.*.city'           => 'required|string' ,
            'address.*.complement'     => 'nullable|string' ,
            'address.*.number_address' => 'required|string' ,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cadastro  $cadastro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cadastro $cadastro)
    {
       return $cadastro->delete()->Address()->Phone();
    }
}
