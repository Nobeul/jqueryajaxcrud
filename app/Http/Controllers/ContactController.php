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
    //autocomplete fetch
    function fetch(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');
            $data = Contact::orderBy('id', 'desc')->where('name', 'LIKE', "%{$query}%")->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach ($data as $row) {
                $output .= '<li><a href="#">' . $row->name . '</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
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
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->password = $request->password;

        $contact->save();
        return ['success' => true, 'message' => 'Data Inserted'];
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

// Duplicate email and search functionality add tomorrow
