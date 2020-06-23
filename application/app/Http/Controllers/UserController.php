<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\User;
use DB;
use Image;
use PDF;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function edit(User $user)
    {   
        $users = Auth::user();
        return view('users.edit', compact('user'));
    }
    public function update(User $user)
    { 
        if(Auth::user()->email == request('email')) {
        
            $this->validate(request(), [
                    'name' => 'required',
                  //  'email' => 'required|email|unique:users',
                    'password' => 'required|min:4|confirmed'
                ]);
        
                $user->name = request('name');
               // $user->email = request('email');
                $user->password = bcrypt(request('password'));
        
                $user->save();
        
                return redirect('/account')->with('success', 'User Updated');
                
            }
            else{
                
            $this->validate(request(), [
                    'name' => 'required',
                    'email' => 'required|email|unique:users',
                    'password' => 'required|min:4|confirmed'
                ]);
        
                $user->name = request('name');
                $user->email = request('email');
                $user->password = bcrypt(request('password'));
        
                $user->save();
        
                return redirect('/account')->with('success', 'User Updated');
                
            }
    }
        public function account(){
            $user = Auth::user();
            return view('/account', compact('user'));
        }

        public function update_avatar(Request $request){
             $user = Auth::user();

            //Handle the user upload of avatar
            if($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $filename = time().'.'.$avatar->getClientOriginalExtension();
                $img = Image::make($avatar)->resize(250,250);
                $img->insert(public_path('images/watermark.png'), 'center', 50, 50);
                $img->save(public_path('images/'.$filename));
                
                //Delete current image before uploading new image 
                 if ($user->avatar !== 'default.jpg') {
                $file = public_path('images/' . $user->avatar);

                if (File::exists($file)) {
                    unlink($file);
                }

            }
                $user = Auth::user();
                $user->avatar = $filename;
                $user->save();

                return back()->withInput();
            }
        
        }

        public function export_pdf()
        {
            // Fetch all users from database
            $data = User::get();
            // Send data to the view using loadView function of PDF facade
            $pdf = PDF::loadView('pdf.posts', $data);
            // If you want to store the generated pdf to the server then you can use the store function
            $pdf->save(storage_path().'_filename.pdf');
            // Finally, you can download the file using download function
            return $pdf->download('posts.pdf');
        }
}