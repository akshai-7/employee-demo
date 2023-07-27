<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('user');
    }

    public function userlist()
    {
        $users = User::paginate(5);
        return view('/user', ['users' => $users]);
    }

    public function edituser($id)
    {
        $edit = User::where('id', $id)->get();
        return view('/edituser', compact('edit'));
    }

    public function update(Request $request)
    {

        $update = User::where('id', $request->id)->first();
        $update->firstname = $request['firstname'];
        $update->lastname = $request['lastname'];
        $update->fathername = $request['fathername'];
        $update->email = $request['email'];
        $update->address = $request['address'];
        $update->mobile = $request['mobile'];
        $update->description = $request['description'];
        $data = $request->all();
        $img = array();
        for ($i = 0; $i < count($data['image']); $i++) {
            $imageName = time() . '.' . $data['image'][$i]->getClientOriginalName();
            $data['image'][$i]->move(public_path('images'), $imageName);
            array_push($img, $imageName);
        }
        $data1 = array(
            'image' =>  implode(",", $img),
        );
        $update->image = $data1['image'];
        $update->save();

        session()->flash('message', ' Updated Successfully');

        return redirect('/user');
    }

    public function remove($id)
    {
        $remove = User::find($id);
        $remove->delete();
        session()->flash('message1', '  Employee Deleted');
        return redirect('/user');
    }

    public function usersearch(Request $request)
    {

        $query = $request['query'];
        if ($request['query'] == null) {
            $users = User::paginate(5);
        } elseif ($request['query'] != null) {
            $users = User::where('firstname', 'LIKE', "%$query%")
                ->orWhere('email', 'LIKE', "%$query%")
                ->orWhere('mobile', 'LIKE', "%$query%")
                ->paginate(5);
        }
        return view('/user', ['users' => $users]);
    }
}
