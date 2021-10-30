<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::all();
        return view('adm.admin.admin', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adm.admin.admin-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username'=>'required|unique:admins',
            'password' => 'required|confirmed|min:6',
        ]);

        $admin = new Admin([
            'username' => $request->get('username'),
            'password' => bcrypt($request->get('password')),
            'role' => 0,
        ]);

        $admin->save();

        return redirect('/admin/akun')->with('success', 'Data admin berhasil di simpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $ids = Auth::guard('admin')->id();

        // if(!Auth::guard('admin')->check()){
        //     if ($ids != $id){
        //         return redirect()->back();
        //     }
        // }

        $admin = Admin::find($id);
        return view('adm.admin.admin-edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $admin = Admin::find($id);

        if ($request->password == null && $request->password_confirmation == null){

            $request->validate([
                'username'=>'required',
            ]);

            $admin->username =  $request->get('username');

        }

        if ($request->password != null || $request->password_confirmation != null){

            $request->validate([
                'username'=>'required',
                'password' => 'required|confirmed|min:6',
            ]);

            $admin->username =  $request->get('username');
            $admin->password = bcrypt($request->get('password'));
            
        }

        $admin->save();

        return redirect('/admin/akun')->with('success', 'Data admin berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admins = Admin::find($id);
        $admins->delete();
        return redirect('/admin/akun')->with('success', 'Data admin berhasil dihapus!');
    }
}
