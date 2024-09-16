<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentRequest;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\ProfessionalProfileRequest;
use App\Models\User;
use App\Services\GeneralService;
use App\Services\ProfileService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public $profileService;
    public $generalService;

    public function __construct(ProfileService $profileService, GeneralService $generalService)
    {
        $this->profileService = $profileService;
        $this->generalService = $generalService;
    }

    public function profile()
    {
        $countryList = $this->generalService->getCountryList();
        $user = auth()->user();
        return view('backend.profile.profile', compact('user','countryList'));
    }

    public function updateProfile(ProfileRequest $request)
    {
        $this->profileService->updateProfile($request->all());
        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function professionalProfile()
    {
        $countryList = $this->generalService->getCountryList();
        $user = auth()->user();
        return view('backend.profile.professionalProfile', compact('user','countryList'));
    }

    public function updateProfessionalProfile(ProfessionalProfileRequest $request)
    {
        // dd('here');
        $this->profileService->updateProfessionalProfile($request->all());
        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function professionalBankDetail()
    {
        $user = auth()->user();
        return view('backend.profile.bank-detail', compact('user'));
    }
    public function updateBankDetails(Request $request)
    {
        $this->profileService->updateBankDetails($request->all());
        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function professionalDocument()
    {
        $user = auth()->user();
        return view('backend.profile.document', compact('user'));
    }
    public function updateDocumentDetails(User $user, DocumentRequest $request)
    {
        $fileName = $user->document_file ?? '';
        if ($request->hasFile('document_file')) {
            $file = $request->file('document_file');
            $fileName = $request->document_name . '_' . $user->id . '.' . $file->getClientOriginalExtension();
            $file->storeAs('documents', $fileName, 'public');
        }

        $this->profileService->updateDocumentDetails($user, $request->all(), $fileName);
        return redirect()->back()->with('success', 'Document updated successfully');
    }
}
