<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // show the page
    public function getlist()
    {
        return view('jqueryAjaxCrud.contactList');
    }
  


    public function getIndex()
    {
        return view('jqueryAjaxCrud.contact-jquery');
    }

    public function getData()
    {
        return Contact::orderBy('id', 'desc')->get();
    }

    public function postStore(Request $request)
    {
        
        $email = Contact::where(['email' => $request->email])->first();
        // dd("Result ". $email);
        if(count($email)>0){
            return ['success' => false, 'message' => 'Email already taken'];
        }else{

            $contact = new Contact;
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->password = $request->password;

            $contact->save();
            return ['success' => true, 'message' => 'Data Inserted'];
        

        }
       
    }

    public function postEdit($id)
    {
        $contact = Contact::find($id);
        return view('jqueryAjaxCrud.updateContact')->with('contact', $contact);
    }

    public function postUpdate(Request $request)
    {
        $contact = Contact::find($request->id);
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->password = $request->password;

        $contact->save();
        // return view('jqueryAjaxCrud.updateContact');
        return ['success' => true, 'message' => 'Data Updated'];
    }

    public function PostDelete(Request $request)
    {
        $contact = Contact::find($request->id);

        if (!is_null($contact)) {
            $contact->delete();
        }
        return ['success' => true, 'message' => 'Data Deleted'];
    }

    function checkEmail(Request $request)
    {
        if ($request->get('email')) {
            $email = $request->get('email');
            $data = Contact::where('email', $email)->count();
            if ($data > 0) {
                echo 'not_unique';
            } else {
                echo 'unique';
            }
        }
    }


    // For searching 
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $contacts = Contact::where('name', 'LIKE', '%' . $request->search . "%")->orWhere('email', 'LIKE', '%' . $request->search . "%")->get();
            if ($contacts) {
                foreach ($contacts as $key => $contact) {
                    $output .= '<tr>' .
                        '<td>' . $contact->id . '</td>' .
                        '<td>' . $contact->name . '</td>' .
                        '<td>' . $contact->email . '</td>' .
                        '<td>' . $contact->password . '</td>' .
                        '<td><button type="button" class="btn btn-warning btnEdit" title="Edit Record">Edit</button>
                        <button type="button"  class="btn btn-danger tableDltBtn" style="margin-left:10px" data-toggle="modal" data-target="#DeleteModal" title="Delete Record">Delete</button></td>' .
                        '</tr>';
                }
                return Response($output);
            }
        }
    }
}
// search functionality done
// Duplicate email check
// Add confirm password field
// Make a login panel
