<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use App\Models\UserModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar User',
            'list' => ['Home', 'User'],
        ];

        $page = (object)[
            'title' => 'Daftar user yang terdaftar dalam sistem',
        ];

        $activeMenu = 'user';

        $getLevel = LevelModel::all();

        return view('layouts.user.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $getLevel, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        $getUsers = UserModel::select('user_id', 'username', 'nama', 'level_id')->with('level');

        if ($request->level_id) {
            $getUsers->where('level_id', $request->level_id);
        }

        return DataTables::of($getUsers)->addIndexColumn()->addColumn('aksi', function ($user) {
                $btn = '<a href="' . url('/users/show/' . $user->user_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/users/' . $user->user_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/users/' . $user->user_id) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })->rawColumns(['aksi'])
            ->make(true);
    }

    public function store(Request $request){
        $request->validate([
            'username' => 'required|string|min:3|unique:m_user,username',
            'nama' => 'required|string|max:100',
            'password' => 'required|min:5',
            'level_id' => 'required|integer',
        ]);

        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt($request->password),
            'level_id' => $request->level_id,
        ]);

        return redirect('/users')->with('success','Data user berhasil disimpan');
    }

    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Tambah User',
            'list' => ['Home', 'User', 'Tambah'],
        ];

        $page = (object)[
            'title' => 'Tambah user baru',
        ];

        $level = LevelModel::all();
        $activeMenu = 'user';

        return view('layouts.user.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level,'activeMenu' => $activeMenu]);
    }
    
    public function show(string $id){
        $getUser = UserModel::with('level')->find($id);

        $breadcrumb = (object)[
            'title' => 'Detail User',
            'list' => ['Home', 'User', 'Detail'],
        ];

        $page = (object)[
            'title' => 'Detail user',
        ];

        $activeMenu = 'user';

        return view('layouts.user.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $getUser,'activeMenu' => $activeMenu]);
    }
    
    public function edit(string $id){
        $getUser = UserModel::find($id);
        $getLevel = LevelModel::all();

        $breadcrumb = (object)[
            'title' => 'Edit User',
            'list' => ['Home', 'User', 'Edit'],
        ];

        $page = (object)[
            'title' => 'Edit user',
        ];

        $activeMenu = 'user';

        return view('layouts.user.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $getUser, 'level' => $getLevel,'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, string $id){
        $request->validate([
            'username' => 'required|string|min:3|unique:m_user,username,'.$id.',user_id',
            'nama' => 'required|string|max:100',
            'level_id' => 'required|integer',
        ]);

        UserModel::find($id)->update([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => $request->password ? bcrypt($request->password) : UserModel::find($id)->password,
            'level_id' => $request->level_id,
        ]);

        return redirect('/users')->with('success', 'Data user berhasil diubah');
    }

    public function destroy(string $id){
        $check = UserModel::find($id);
        if (!$check){
            return redirect('/users')->with('error', 'Data user tidak ditemukan');
        }

        try{
            UserModel::destroy($id);
            return redirect('/users')->with('success', 'Data user berhasil dihapus');
        }catch(QueryException $e){
            return redirect('/users')->with('error', 'Data user gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
