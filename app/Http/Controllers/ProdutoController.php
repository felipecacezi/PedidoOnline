<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $produtos = DB::select('SELECT
                                *
                            FROM PRODUTO', [1]);

        return view('controle_estoque/produto/index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $itens = DB::select('SELECT
                                *
                            FROM ITEM', [1]);



        return view('controle_estoque/produto/create', compact('itens'));
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

            $id_inserido = DB::table('produto')->insertGetId([
                'produto_nome'           => $request->dados['produto_nome'], 
                // 'produto_imagem'         => base64_encode($request->dados['imagem']), 
                'produto_descricao'      => $request->dados['produto_descricao'], 
                'produto_modo_preparo'   => $request->dados['produto_modo_preparo'],             
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
        
        $produto_id = $id;

        $res = DB::table('produto')->where('produto_id', $produto_id)->get()[0];
        
        return view('controle_estoque/produto/create', compact('res'));

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

            DB::table('produto')
                    ->where('produto_id', $id)
                    ->update([
                                'produto_nome'           => $request->dados['produto_nome'], 
                                // 'produto_imagem'         => base64_encode($request->dados['imagem']), 
                                'produto_descricao'      => $request->dados['produto_descricao'], 
                                'produto_modo_preparo'   => $request->dados['produto_modo_preparo'],                
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

            DB::table('produto')->where('produto_id', $id)->delete();
            
            $retorno['status']     = 'ok';
            $retorno['deleted_id'] = $id;

        }catch(Exception $e){
            $retorno['status'] = 'error';
        }

        return json_encode($retorno);

    }
}
