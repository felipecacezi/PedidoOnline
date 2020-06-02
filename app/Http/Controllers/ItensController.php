<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelItens;
use Illuminate\Support\Facades\DB;

class ItensController extends Controller
{

    private $objItem;

    public function __construct()
    {
        $this->objItem = new ModelItens();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $itens = DB::select('SELECT
                                *
                            FROM ITEM 
        
                            JOIN unidade_medida 
                                ON ITEM.item_unidade_medida_id = unidade_medida.unidade_medida_id', [1]);

//dd($itens); exit;                                
        
        return view('controle_estoque/item/index', compact('itens'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $res = '';

        $unidades_medida = DB::select('SELECT
                                *
                                FROM UNIDADE_MEDIDA', [1]);

        return view('controle_estoque/item/create', compact('unidades_medida','res'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $retorno = array();

        try {

            DB::table('item')->insert([
                'item_nome'              => $request->dados['item_nome'], 
                'item_unidade_medida_id' => $request->dados['item_unidade_medida'], 
                'item_descricao'         => $request->dados['item_descricao'],             
                'created_at'             => date('Y-m-d H:i:s')
            ]);

            $retorno['status'] = 'ok';

        } catch(Exception $e) {

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
        $item_id = $id;

        $unidades_medida = DB::select('SELECT
                                *
                                FROM UNIDADE_MEDIDA', [1]);

        $res = DB::table('item')->where('item_id', $id)->get()[0];
        
        return view('controle_estoque/item/create', compact('res', 'unidades_medida'));
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

            DB::table('item')
                    ->where('item_id', $id)
                    ->update([
                                'item_nome'              => $request->dados['item_nome'], 
                                'item_unidade_medida_id' => $request->dados['item_unidade_medida'], 
                                'item_descricao'         => $request->dados['item_descricao'],             
                                'updated_at'             => date('Y-m-d H:i:s')
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

            DB::table('item')->where('item_id', $id)->delete();
            
            $retorno['status']     = 'ok';
            $retorno['deleted_id'] = $id;

        }catch(Exception $e){
            $retorno['status'] = 'error';
        }

        return json_encode($retorno);

    }
}
