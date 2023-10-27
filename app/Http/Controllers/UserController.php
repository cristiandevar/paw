<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Mail\USerSendMail;
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

    public function contact() {
        return view('panel.user.contact');
    }

    public function sendEmail(Request $request){
        if ( $request->has('subject') && $request->has('body')) {

            $data = array(
                'name' => auth()->user()->name,
                // 'email' => auth()->user()->email,
                'email' => 'cristianprogramadorunsa@gmail.com',
                'subject' => $request->subject,
                'body' => $request->body,

            );
            $input = $request->all();
        
            Mail::to($data['email'])->send(new UserSendMail($data));
        }
        return redirect()
                ->route('user-contact')
                ->with('alert', 'Su correo se ha enviado exitosamente.');
    }

}