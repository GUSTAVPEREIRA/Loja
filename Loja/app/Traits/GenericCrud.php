<?php

namespace App\Traits;

use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

trait GenericCrud
{

    private $model;

    /**
     * @param mixed $model
     */
    public function setModel($model = null)
    {
        if (!isset($model)) {
            return $this;
        }
        $this->model =  is_object($model) ? new $model : null;
        return $this;
    }


    public function store(Request $request)
    {
        if (!isset($this->model)) {
            return redirect()->back();
        }

        try {
            DB::beginTransaction();
            $this->model->create($request->all());
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
        return redirect()->back();
    }

//    public function update()
//    {
//
//    }
//
//    public function delete()
//    {
//
//    }
//
//    public function show($id)
//    {
//
//    }
}
