<?php 

namespace App\Controllers;
use App\Models\Users;

class BackendController extends BaseController
{
    public function index()
    {
        $users = new Users();
        $user = $users->getRecoreds();
        $data['user'] = $user;
        return view('backend/index', $data); 
    }
    
    public function create()
    {
        $model = new Users();
        
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $phone = $this->request->getPost('phone');
        $experience = $this->request->getPost('experience');
        
        for ($i=0; $i < count($name); $i++) { 
            $model->save([
                'name'=>$name[$i],
                'email'=>$email[$i],
                'phone'=>$phone[$i],
                'experience'=>$experience[$i],
            ]);    
        }
        
        return redirect()->to('/');
    }
    
    public function distroy($id)
    {
        $model = new Users();
        $model->delete($id);

        return redirect()->to('/');
    }
}