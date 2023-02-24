<?php

namespace App\Http\Controllers;

use App\Models\ContactServices;
use App\Models\ContactServicesCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactServicesCategoryController extends Controller {
    //

    public function agents(Request $request) {
        $data['title'] = "All Agents & Categories";

        $data['agents'] = ContactServicesCategories::with('contactServices')->get();

        return view('admin.agents.agents', $data);
    }

    public function create(Request $request) {
        $data['title'] = "Create Agent and Category";

        $data['services'] = ContactServices::all();

        if ($request->post()) {
            $request->validate([
                'image' => 'required|mimes:jpeg,jpg,png',
                'name' => 'required',
                'agent_name' => 'required',
                'agent_email' => 'required',
                'contact_services_id' => 'required',
            ]);

            $agent_img = null;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $image = 'portfolio_'.time().rand().'.'.$extension;
                $file->move('assets/front/img/', $image);
                $agent_img = $image;
            }

            $agent = new ContactServicesCategories([
                'name' => $request->name,
                'contact_services_id' => $request->contact_services_id,
                'agent_name' => $request->agent_name,
                'agent_email' => $request->agent_email,
                'agent_img' => $agent_img,
            ]);

            if ($agent->save()) {
                Session::flash('success', 'Created successfully');
                return redirect(route('admin.agents'));
            } else {
                Session::flash('danger', 'Error: Not Created');
            }
        }

        return view('admin.agents.create', $data);
    }

    public function edit(Request $request, $id) {
        $data['services'] = ContactServices::all();

        if ($request->post()) {
            $agent = ContactServicesCategories::findOrFail($id);

            $agent->name = $request->name;
            $agent->contact_services_id = $request->contact_services_id;

            $agent->agent_name = $request->agent_name;
            $agent->agent_email = $request->agent_email;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $image = 'portfolio_'.time().rand().'.'.$extension;
                $file->move('assets/front/img/', $image);
                $agent->agent_img = $image;
            }

            if ($agent->save()) {
                Session::flash('success', 'Updated Successfully');
                return redirect(route('admin.agents'));
            } else {
                Session::flash('danger', 'Error: Not Updated');
            }
        }   // # if request->post()

        $agent = ContactServicesCategories::findOrFail($id);
        $data['agent'] = $agent;

        $data['title'] = "Edit Agent for {$agent->name}";

        return view('admin.agents.edit', $data);
    }

    public function delete(Request $request) {
        if (!$request->post()) {
            return;
        }

        $agent = ContactServicesCategories::findOrFail($request->id);

        $agent->agent_email = null;
        $agent->agent_img = null;
        $agent->agent_name = null;

        if ($agent->save()) {
            Session::flash('success', 'Deleted Successfully');
        } else {
            Session::flash('danger', 'Error: not deleted');
        }

        return redirect()->back();
    }
}
