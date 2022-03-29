<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\admins\StoreRequest;
use App\Http\Requests\admins\UpdateRequest;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use NabilAnam\SimpleUpload\SimpleUpload;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::latest()->paginate(10);
        return view('backend.admins.index', compact('admins'));
    }

    public function create()
    {
        return view('backend.admins.create');
    }

    public function store(StoreRequest $request)
    {
        $all = $request->except('password_confirmation');
        $all['password'] = Hash::make($request->password);
        $all['image'] = (new SimpleUpload)
            ->file($request->image)
            ->dirName('admins')
            ->save();
        // dd( $all);
        Admin::create($all);

        return redirect()
            ->route('backend.admins.index')
            ->with('message', 'Admin created successfully!');
    }

    public function edit(Admin $admin)
    {
        return view('backend.admins.edit', compact('admin'));
    }

    public function update(UpdateRequest $request, Admin $admin)
    {
        $all = $request->except('password_confirmation');
        $all['password'] = Hash::make($request->password);
        $all['image'] = (new SimpleUpload)
            ->file($request->image)
            ->dirName('admins')
            ->deleteIfExists($admin->image)
            ->save();
        // dd($all);
        $admin->update($all);

        return redirect()
            ->route('backend.admins.index')
            ->with('message', 'Admin updated successfully!');
    }

    public function destroy(Admin $admin)
    {
        try {
            $admin->delete();
        } catch (\Exception $e){
            return redirect()
                ->route('backend.admins.index')
                ->with('error', 'Admin is referenced in another place!');
        }

        return redirect()
            ->route('backend.admins.index')
            ->with('message', 'Admin deleted successfully!');
    }
}
