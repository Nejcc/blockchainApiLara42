<?php

namespace App\Requests;

use Illuminate\Support\Facades\Input;
//use Illuminate\Validation\Validator;

use Illuminate\Support\Facades\Validator;


class TransactionRequest
{

    protected $rules = [
        'hash' => ['required'],
    ];

    protected $request;
    public $input;

    /**
     * TransactionRequest constructor.
     * @param $request
     */
    public function __construct($request)
    {
        $this->request = $this->input = $request;
    }

    /**
     * @return bool
     */
    public function validate()
    {
        $validator = Validator::make(
            $this->request, $this->rules
        );

        if ($validator->fails()) {
            return $validator->messages();
        }

        return false;
    }
}