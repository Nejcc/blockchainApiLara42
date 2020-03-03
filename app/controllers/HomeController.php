<?php

use App\Facades\Api;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use App\Requests\TransactionRequest;;

class HomeController extends BaseController
{
    protected $rules = [
        'hash' => ['required'],
    ];

    protected $layout = 'layouts.master';

    /**
     *  master layout
     */
    public function index()
    {
        $model = DB::table('transactions')->orderBy('id', 'desc')->paginate(5);
        return $this->layout->content = View::make('transaction.index', compact('model'));
    }

    /**
     * @return mixed
     */
    public function get()
    {
        $request = new TransactionRequest(Input::all());
        $request->validate();

        $data = Api::get('https://blockchain.info/rawtx/' . $request->input['hash'], 'Tx id is not valid');

        if (empty($data->inputs))
            return Redirect::route('home');

        DB::table('transactions')->insert([
            'txid' => $request->input['hash'],
            'addr' => 0,
            'value' => 0
        ]);


        return View::make('transaction.show')
//            ->with('payload', (!empty($data->inputs[0]->prev_out)) ? $data : '')
            ->with('newblock', $data->out)
            ->with('raw', $data);
    }
}
