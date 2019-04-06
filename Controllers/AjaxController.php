<?php

/*
|--------------------------------------------------------------------------
| StAuth10065: I Dylan Hernandez, 000307857 certify that this material is my original work. 
| No other person's work has been used without due acknowledgement. 
| I have not made my work available to anyone else.
|--------------------------------------------------------------------------
*/

namespace App\Http\Controllers;

use Request;
use App\Http\Logic\DogRepository;

class AjaxController extends Controller
{
    protected $dogRepo;

    public function __construct(DogRepository $dogRepo)
    {
        $this->dogRepo = $dogRepo;
    }

    public function showAjax()
    {
        return view('ajax');
    }

    public function ajaxCreate() 
    {
        $input = Request::all();
        $createNew = $this->dogRepo->createNewDog($input);
        return $input;
    }

    public function ajaxRead() 
    {
        $data = $this->dogRepo->getAllDogs();
        return response()->json($data)->header('Content-Type', 'application/json');
    }

    public function ajaxUpdate($id)
    {
        $data = $this->dogRepo->getDogInformation($id);
        return response()->json($data)->header('Content-Type', 'application/json');
    }

    public function ajaxUpdatePost($id)
    {
        $input = Request::all();
        $updateDog = $this->dogRepo->changeDog($input, $id);
        return $input;
    }

    public function ajaxDelete($id)
    {
        $delete = $this->dogRepo->removeDog($id);
        return [$delete];
    }
}
