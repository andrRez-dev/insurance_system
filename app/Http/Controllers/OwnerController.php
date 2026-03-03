<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Owner;

class OwnerController extends Controller
{
    public function __construct(Owner $ownerModel){
        $this->ownerModel = $ownerModel;
    }

    public function getData(): View{
        $owners = $this->ownerModel->all();

        return view('owners', [
            'owners' => $owners
        ]);
    }

    public function add(Request $req){
        $req->validate([
            'owner_name' => 'required|string',
            'owner_surname' => 'required|string'
        ]);

        $this->ownerModel->name = $req->input('owner_name');
        $this->ownerModel->surname = $req->input('owner_surname');

        $this->ownerModel->save();

        return redirect()->to('/');
    }

    public function edit($id, Request $req){
        if($req->isMethod("POST")){
            $req->validate([
            'owner_name' => 'required|string',
            'owner_surname' => 'required|string'
            ]);
            $this->ownerModel = Owner::find($id);
            $this->ownerModel->name = $req->input('owner_name');
            $this->ownerModel->surname = $req->input('owner_surname');
            $this->ownerModel->save();

            return redirect()->to('/');
        }

        return view('owner_edit', ['owner' => $this->ownerModel->find($id)]);
    }

    public function delete($id){
        $this->ownerModel->find($id)->delete();
        return redirect()->to('/');
    }
}
