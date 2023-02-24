<?php

namespace App\Http\Controllers;

use App\Models\Applications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ApplicationController extends Controller
{
    //

    public function applications() {
        $applications = Applications::all();

        return view('admin.applications.applications', [
            'title' => "Applications",
            'applications' => $applications
        ]);
    }

    public function process(Request $request) {
        $application = Applications::findOrFail($request->id);

        $application->status = "In Process";
        $application->status_color = "text-info";

        if ($application->save()) {
            Session::flash('success', 'Application marked In Process');
        } else {
            Session::flash('danger', 'Error: Application not marked');
        }

        return redirect()->back();
    }

    public function accept(Request $request) {
        $application = Applications::findOrFail($request->id);

        $application->status = "Accepted";
        $application->status_color = "text-success";

        if ($application->save()) {
            Session::flash('success', 'Application marked Accepted');
        } else {
            Session::flash('danger', 'Error: Application not marked');
        }

        return redirect()->back();
    }

    public function reject(Request $request) {
        $application = Applications::findOrFail($request->id);

        $application->status = "Rejected";
        $application->status_color = "text-danger";

        if ($application->save()) {
            Session::flash('success', 'Application marked Rejected');
        } else {
            Session::flash('danger', 'Error: Application not marked');
        }

        return redirect()->back();
    }
}
