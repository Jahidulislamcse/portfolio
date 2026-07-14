<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Setting;
use App\Services\BranchService;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    protected BranchService $branchService;

    public function __construct(BranchService $branchService)
    {
        $this->branchService = $branchService;
    }

    public function index()
    {
         $branches = Branch::latest()->paginate(10);
        return view('admin.branches.index', compact('branches'));
    }

    public function create()
    {
        return view('admin.branches.create');
    }

    public function store(Request $request)
    {
        $data = $this->branchService->validateBranch($request);

        $data['image'] = $this->branchService->handleImageUpload($request);

        if (!empty($data['password'])) {
            $data['password'] = Crypt::encryptString($data['password']);
        }

        Branch::create($data);

        return redirect()->route('admin.branches.index')
            ->with('success', 'Branch created successfully.');
    }

    public function edit(Branch $branch)
    {
        return view('admin.branches.edit', compact('branch'));
    }

    public function update(Request $request, Branch $branch)
    {
        $data = $this->branchService->validateBranch($request);

        $data['image'] = $this->branchService->handleImageUpload($request, $branch->image);

        $branch->update($data);

        return redirect()->route('admin.branches.index')->with('success', 'Branch updated successfully.');
    }

    public function userBranches()
    {
        $branches = Branch::all(); 
        $setting = Setting::first();
        return view('branches.index', compact('branches','setting'));
    }

    public function destroy(Branch $branch)
    {
        if ($branch->image && file_exists(public_path('upload/' . $branch->image))) {
            unlink(public_path('upload/' . $branch->image));
        }

        $branch->delete();

        return redirect()->route('admin.branches.index')
            ->with('success', 'Branch deleted successfully.');
    }

    public function autoLogin(Branch $branch)
    {
        $password = $branch->password ? Crypt::decryptString($branch->password) : null;
        return view('admin.branches.autologin', [
            'loginUrl' => $branch->admin_link,   
            'password' => $password,
            'account' => $branch->account,     
            'fieldNames' => [
                'username' => 'username',        
                'password' => 'password'
            ]
        ]);
    }



}
