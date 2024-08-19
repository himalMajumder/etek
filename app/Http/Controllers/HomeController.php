<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductQuestionAnswer;
use App\Models\ContactRequest;
use App\Models\Job;
use App\Models\JobApply;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use CURLFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function login()
    {
        return view('frontend.user.login');
    }

    public function registerAccount()
    {
        return view('frontend.user.registerAccount');
    }


    public function registerAccountSave(Request $request)
    {
    
    }

    public function quesitonSave(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'sometimes|required|string|max:255',
            'email' => 'required|email|max:255',
            'question' => 'required|string',
            'product_id' => 'required|string',
            'slug' => 'sometimes|string',
        ]);
        $data = [
            'full_name' => $validatedData['full_name'],
            'email' => $validatedData['email'],
            'question' => $validatedData['question'],
            'product_id' => $validatedData['product_id'],
            'slug' => $validatedData['slug'],
        ];
        ProductQuestionAnswer::create($data);
        return redirect()->back()->with('success', 'Question submitted successfully!');
    }

    public function contactSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'name'           => 'sometimes|required|string|max:255',
            'company_name'   => 'sometimes|string',
            'phone'          => 'sometimes|string',
            'email'          => 'sometimes|email|max:255',
            'message'        => 'sometimes|string',
        ]);
        $data = [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'company_name' => $validatedData['company_name'],
            'phone' => $validatedData['phone'],
            'message' => $validatedData['message'],
        ];
        ContactRequest::create($data);
        return redirect()->back()->with('success', 'Contact Request submitted successfully!');
    }

    public function jobDetails($slug)
    {
        $job = Job::where('slug', $slug)->first();
        return view('frontend.pages.jobDetails', compact('job'));
    }

    public function jobApply($id)
    {
        $job = Job::where('id', $id)->first();

        return view('frontend.pages.job_apply', compact('job'));
    }










    public function jobApplySubmit(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'job_id' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'online_link' => 'nullable|url|max:255',
            'present_address' => 'sometimes|string|max:255',
            'permanent_address' => 'sometimes|string|max:255',
            'cover_letter' => 'sometimes|string|max:5000',
            'about_position' => 'sometimes|string|max:255',
            'attach_file' => 'sometimes|file|mimes:jpeg,png,jpg,gif,pdf,doc,docx|max:2048',
        ]);

        $attachment = NULL;

        if ($request->hasFile('attach_file')) {
            $attachFile = $request->file('attach_file');
            $attachmentName = 'ticket-' . $validatedData['name'] . '.' . $attachFile->getClientOriginalExtension();
            $location = public_path('support_ticket_attachments/');
            $attachFile->move($location, $attachmentName);
            $attachment = "support_ticket_attachments/" . $attachmentName;


            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => env('ADMIN_URL') . '/api/upload/ticket/file',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array(
                    'attachment' => new CURLFile(public_path($attachment))
                ),
            ));


            $response = curl_exec($curl);
            curl_close($curl);

            if (!$response) {
                return 'Attach file upload failed!';
            }
        }

        JobApply::create($validatedData);
        return 'Job application submitted successfully!';
    }
}
