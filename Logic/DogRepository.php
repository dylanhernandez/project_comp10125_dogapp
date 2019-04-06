<?php

/*
|--------------------------------------------------------------------------
| StAuth10065: I Dylan Hernandez, 000307857 certify that this material is my original work. 
| No other person's work has been used without due acknowledgement. 
| I have not made my work available to anyone else.
|--------------------------------------------------------------------------
*/

namespace App\Http\Logic;

use Carbon\Carbon;
use App\Http\Models\dog;

class DogRepository 
{
    public function getAllDogs()
    {
        $dogs = dog::all();
        return $dogs;
    }

    public function getDogInformation($id)
    {
        $dog = dog::find($id);
        return $dog;
    }

    public function createNewDog($data)
    {
        $dog_name = (isset($data["name"])) ? $data["name"] : "";
        $dog_age = (isset($data["age"])) ? $data["age"] : "";
        $dog_owner = (isset($data["owner"])) ? $data["owner"] : "";
        $dog_toys = (isset($data["toys"])) ? $data["toys"] : "";
        if(!empty($dog_name) && !empty($dog_age) && !empty($dog_owner) && !empty($dog_toys)) {
            $newDog = new dog;
            $newDog->name = $dog_name;
            $newDog->age = $dog_age;
            $newDog->owner = $dog_owner;
            $newDog->toys = $dog_toys;
            $newDog->created_at = Carbon::now();
            $newDog->updated_at = Carbon::now();
            if($newDog->save()) {
                return true;
            }
        }
        return false;
    }

    public function changeDog($data, $id) 
    {
        $editDog = dog::find($id);
        if($editDog) {
            $dog_name = (isset($data["name"])) ? $data["name"] : "";
            $dog_age = (isset($data["age"])) ? $data["age"] : "";
            $dog_owner = (isset($data["owner"])) ? $data["owner"] : "";
            $dog_toys = (isset($data["toys"])) ? $data["toys"] : "";
            if(!empty($dog_name) && !empty($dog_age) && !empty($dog_owner) && !empty($dog_toys)) {
                $editDog->name = $dog_name;
                $editDog->age = $dog_age;
                $editDog->owner = $dog_owner;
                $editDog->toys = $dog_toys;
                $editDog->updated_at = Carbon::now();
                if($editDog->save()) {
                    return true;
                }
            }
        }
        return false;
    }

    public function removeDog($id) 
    {
        $removeDog = dog::find($id);
        if($removeDog) {
            $removeDog->delete();
            return true;
        }
        return false;
    }
}