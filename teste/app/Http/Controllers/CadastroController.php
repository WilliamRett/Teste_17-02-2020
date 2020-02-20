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
        return view('cadastro.create');
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
            'phone_number'             => 'required|array'  ,
            'zipcode'                  => 'required|string' ,
            'address'                  => 'required|string' ,
            'district'                 => 'required|string' ,
            'state'                    => 'required|string' ,
            'city'                     => 'required|string' ,
            'complement'               => 'nullable|string' ,
            'number'                   => 'required|string' ,
        ]);
        $cadastro = new Cadastro();
        $cadastro->fill($validate);
        $cadastro->save();
        $address = new Address();
        $address['cadastro_id'] = $cadastro->id;
        Address::create($address);
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


    public function insert(Request $request){
        if ($request->ajax())
        {
            $rule =array(
                'phone_number.*'  =>  'required'
            );
            $erro = Validator::make($request->all(),$rules);
            if ($erro->fails())
            {
              return response()->json([
                  'error' => $error->errors()->all()
              ]);
            }
            $phone  =  $request->phone;
            for ($count=0; $count < count($phone) ; $count++) {
                $date =array(
                    'phone'  =>  $phone[$count],
                );
                $insert_data = $data;
            }

            Phone::insert($insert_data);
            return response()->json([
                'Sucesso'   => 'adicionado com sucesso'
            ]);

        }
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
