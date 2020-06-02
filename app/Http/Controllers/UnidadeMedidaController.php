<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelUnidadeMedida;
use Illuminate\Support\Facades\DB;


class UnidadeMedidaController extends Controller
{

    private $objUnidadeMedida;

    public function __construct()
    {
        $this->objUnidadeMedida = new ModelUnidadeMedida();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unidades_medida = $this->objUnidadeMedida->all();
        return view('controle_estoque/unidade_medida/index',compact('unidades_medida'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('controle_estoque/unidade_medida/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        if(!isset($request->dados['unidade_medida']) || empty($request->dados['unidade_medida'])){
            $retorno['status']  = 'erro_unidade_medida_vazio';
            $retorno['message'] = '<strong class="text-danger">Atenção</strong>, o campo unidade de medida é obrigatório';
            return json_encode($retorno);
        }


        $retorno = array();
        
        try{

            DB::table('unidade_medida')->insert([
                'unidade_medida_nome' => $request->dados['unidade_medida'], 
                'created_at'        => date('Y-m-d H:i:s')
            ]);

            $retorno['status'] = 'ok';

        }catch(Exception $e){

            $retorno['status'] = 'error';
            
        }
        
        return json_encode($retorno);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $unidade_medida_id = $id;

        $res = DB::table('unidade_medida')->where('unidade_medida_id', $id)->get()[0];
        
        return view('controle_estoque/unidade_medida/create', compact('res'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        try{

            DB::table('unidade_medida')
                    ->where('unidade_medida_id', $id)
                    ->update([
                                'unidade_medida_nome' => $request->dados['unidade_medida'],
                                'updated_at'          => date('Y-m-d H:i:s')
                            ]);

            $retorno['status'] = 'ok';

        }catch(Exception $e){

            $retorno['status'] = 'error';
            
        }
        
        return json_encode($retorno);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        try{

            DB::table('unidade_medida')->where('unidade_medida_id', $id)->delete();
            
            $retorno['status']     = 'ok';
            $retorno['deleted_id'] = $id;

        }catch(Exception $e){
            $retorno['status'] = 'error';
        }

        return json_encode($retorno);

    }
}
