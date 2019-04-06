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

class CrudController extends Controller
{
    protected $dogRepo;

    public function __construct(DogRepository $dogRepo)
    {
        $this->dogRepo = $dogRepo;
    }

    public function crudCreate()
    {
        $allDogs = $this->dogRepo->getAllDogs();
        $form = [ 'name' => '', 'age' => '', 'owner' => '', 'toys' => '', 'reference' => '/crud/add'];
        $data = [ 'dogs' => $allDogs, 'form' => 'add', 'formData' => $form];
        return view('crud', ['data' => $data]);
    }

    public function crudCreatePost()
    {
        $input = Request::all();
        $createNew = $this->dogRepo->createNewDog($input);
        return redirect()->action('CrudController@crudRead');
    }

    public function crudRead()
    {
        $allDogs = $this->dogRepo->getAllDogs();
        $data = [ 'dogs' => $allDogs, 'form' => false];
        return view('crud', ['data' => $data]);
    }

    public function crudUpdate($id)
    {
        $allDogs = $this->dogRepo->getAllDogs();
        $updateDog = $this->dogRepo->getDogInformation($id);
        if($updateDog) {
            $form = [ 'name' => $updateDog->name, 'age' => $updateDog->age, 'owner' => $updateDog->owner, 'toys' => $updateDog->toys, 'reference' => '/crud/edit/' . $id];
        }
        else { 
            $form = [ 'name' => '', 'age' => '', 'owner' => '', 'toys' => '', 'reference' => '/crud/edit/' . $id];
        }
        $data = [ 'dogs' => $allDogs, 'form' => 'edit', 'formData' => $form];
        return view('crud', ['data' => $data]);
    }

    public function crudUpdatePost($id)
    {
        $input = Request::all();
        $updateDog = $this->dogRepo->changeDog($input, $id);
        return redirect()->action('CrudController@crudRead');
    }

    public function crudDelete($id)
    {
        $delete = $this->dogRepo->removeDog($id);
        return redirect()->action('CrudController@crudRead');
    }    
}
