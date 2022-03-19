<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiteInfo\UpdateRequest;
use App\Models\SiteInfo;
use NabilAnam\SimpleUpload\SimpleUpload;

class SiteInfoController extends Controller
{
    public function index()
    {
        return view('backend.site_info.index');
    }

    public function update(UpdateRequest $request)
    {
        $info = SiteInfo::find(1);

        $logo = (new SimpleUpload)
            ->file($request->file('logo'))
            ->dirName('site')
            ->deleteIfExists($info->logo)
            ->save();

        $info->update([
            'logo' => $logo,
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'short_desc' => $request->short_desc,
        ]);

        return redirect()
            ->route('backend.site_config.info')
            ->with('message', 'Site Information Updated Successfully');
    }
}
