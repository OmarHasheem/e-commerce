<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Concat;

class ContactController extends Controller
{
    //

    public function index() {
        return view('contact',[
            'categories' => Category::all()
        ]
    );
    }

    public function show() {
        return view('admin.contact.index', [
            'contacts' => Contact::all(),
        ]);
    }

    public function store() {
        $inputs[] = request()->validate([
            'subject' => 'required',
            'message' => 'required',
        ]);

        Contact::create([
            'subject' => request('subject'),
            'message' => request('message'),
            'user_id' => auth()->user()->id,
        ]);

        return redirect('');
    }

    public function destroy(Contact $contact) {
        $subject = $contact->subject;
        $contact->delete();

        session()->flash('contact-deleted-message', 'The contact '. $subject . 'has been deleted');

    }
}
