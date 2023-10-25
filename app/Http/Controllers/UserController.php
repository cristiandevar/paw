<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Mail\SendMail;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
/**
 * @return \Illuminate\Support\Collection
*/
public function index()
{
    $users = User::get();
    return view('users', compact('users'));
}
/**
* @return \Illuminate\Support\Collection
*/
public function export()
{
return Excel::download(new UsersExport,
'users.xlsx');
}

public function contactEmail(Request $request){

    $data = array(
        'name' => auth()->user()->name,
        'email' => auth()->user()->email,
        'subject' => $request->subject,
        'body' => $request->body
    );

    Mail::to($data['email'])->send(new SendMail($data));

    return view();
}

}