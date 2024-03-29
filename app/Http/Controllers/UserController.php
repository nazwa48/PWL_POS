<?php 

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests\StorePostRequest;
use App\Models\UserModel; 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Hash; 
 
class UserController extends Controller 
{ 

    public function index(UserDataTable $dataTable)
    {
    return $dataTable->render('user.index');
    }
    public function create()
    {
        return view('user.create');
    }

    public function store(StorePostRequest $request)
    {
        // The incoming request is valid...

        // Retrieve the validated input data...
        $request->validate();

        // Retreive a portion of the validated input data...
        $request->safe()->only(['username', 'nama', 'password', 'level_id']);
        $request->safe()->except(['username', 'nama', 'password', 'level_id']);

        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make('$request->password'),
            'level_id' => $request->level_id,
        ]);

        // Store the post

        return redirect('/user');
    }
    public function edit($id)
    {
    $user = UserModel::find($id);
    return view('user.edit', ['data' => $user]);
    }
    public function edit_simpan($id, Request $request)
    {
    $user = UserModel :: find($id);
    $user->username = $request->username;
    $user->nama = $request->nama;
    $user->password = Hash::make( '$request->password');
    $user->level_id = $request->level_id;
    $user->save();
    return redirect('/user');
    }
    public function delete($id)
    {
    $user = UserModel :: find($id);
    $user->delete();
    return redirect('/user');
    }
}
    
// public function index() 
    // {
    //     $user = UserModel::all(); 
    //     return view('user', ['data' => $user]); 
    // } 
//     public function tambah() 
//     { 
//         return view('user_tambah'); 
//     } 
//     public function tambah_simpan(Request $request) 
//     { 
//             UserModel::create([ 
//                 'username' => $request->username, 
//                 'nama' => $request->nama, 
//                 'password' => Hash::make($request->password), 
//                 'level_id' => $request->level_id 
//             ]); 
//             return redirect('/user'); 
//     }
//     public function ubah($id){
//         $user = UserModel::find($id);
//         return view('user_ubah',['data' => $user]);
//     }
    
//     public function ubah_simpan($id, Request $request){
//         $user = UserModel::find($id);

//         $user->username = $request->username;
//         $user->nama = $request->nama;
//         $user->password = Hash::make('$request->password');
//         $user->level_id = $request->level_id;

//         $user->save();

//         return redirect('/user');
//     }
//     public function hapus($id)
//     {
//         $user = UserModel::find($id);
//         $user->delete();

//         return redirect('/user');
//     }
//     public function index() 
//     { 
//         $user = UserModel::with('level')->get(); 
//         return view('user', ['data' => $user]); 
//     } 
// } 