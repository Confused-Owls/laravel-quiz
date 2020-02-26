<?php
namespace App\Services;

use App\User;
use App\Services\ImageServices;
use Illuminate\Support\Facades\Hash;

class UsersServices
{

    public function __construct(User $user,ImageServices $imageServices)
    {
        $this->user = $user;
        $this->imageServices = $imageServices;
    }

    public function get()
    {
        return $this->user->get();
    }

    public function getById($id)
    {
        return $this->user->findOrfail($id);
    }

    public function store($request)
    {
        try{
            if (array_key_exists('image', $search_array)) {
                echo "The 'first' element is in the array";
            }
            foreach ($request as $key => $value) {
                $image = $request['image'];
                $request['image'] = $this->imageServices->imageMoveWithName($image);
               echo $key."<br>";
            }
            die();
            if ($request->hasFile('image')) {

            }
            die();
            $request['password'] = Hash::make($request['password']);
            return $this->user->create($request);
        }
        catch(Exception $e)
        {
            throw $e;
        }
    }
    public function update($data,$id)
    {
        try{
            $image = $data['image'];
            $data['image'] = $this->imageServices->imageMoveWithName($image);
            $user =$this->getById($id);
            $updatedUser = $user->update($data);
            return $updatedUser;
        }
        catch(Exception $e)
        {
            throw $e;
        }
    }

    public function destroy($id)
    {
        try{
            $user = $this->getById($id);
            return $user->delete($id);
        }
        catch(Exception $e)
        {
            throw $e;
        }
    }
}
