<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use App\Models\Post;
use Illuminate\Support\Facades\App;


use Alert;

class HomeController extends Controller
{
    public function index(string $locale = null)
{
    if (Auth::id()) {
        // Ustaw lokalizację, jeśli została podana
        if ($locale) {
            if (!in_array($locale, ['en', 'pl'])) {
                abort(400); // Nieobsługiwany język
            }
            App::setLocale($locale);
        }

        // Pobierz posty tylko z aktywnym statusem
        $post = Post::where('post_status', '=', 'active')->get();

        // Sprawdź typ użytkownika
        $usertype = Auth()->user()->usertype;

        if ($usertype == 'user') {
            return view('home.homepage', compact('post'));
        } elseif ($usertype == 'admin') {
            return view('admin.adminhome');
        } else {
            return redirect()->back();
        }
    }

    // Jeśli użytkownik nie jest zalogowany, przekieruj na stronę logowania
    return redirect()->route('login');
}


    public function homepage()
    {
        $post = Post::where('post_status','=','active')->get();

        return view('home.homepage', compact('post'));
    }

    public function about()
    {
        return view('home.about');
    }

    public function blog()
    {
        return view('home.blog');
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function post_details($id)
    {
        $post = Post::find($id);

        return view('home.post_details', compact('post'));
    }

    public function create_post()
    {
        return view('home.create_post');
    }

    public function user_post(Request $request)
    {
        $user=Auth()->user();

        $userid = $user->id;

        $name = $user->name;

        $usertype = $user->usertype;

        $post=new Post;

        $post->title = $request->title;

        $post->description = $request->description;

        $post->post_status = 'pending';

        $post->user_id = $userid;

        $post->name = $name;

        $post->usertype = $usertype;

        $image=$request->image;

        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('postimage',$imagename);
    
            $post->image = $imagename;
        }
        $post->save();

        Alert::success('Congrats', 'You have Added the Data Succesfully');

        return redirect()->back();
    }

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('postimage'), $fileName);

            $url = asset('postimage/' . $fileName);
            
            // Zwracamy URL w formacie wymaganym przez CKEditor
            return response()->json([
                'fileName' => $fileName,
                'uploaded' => 1,
                'url' => $url
            ]);
        }
    }

    public function my_post()
    {
        $user = Auth::user();

        $userid = $user->id;

        $data = Post::where('user_id','=',$userid)->get();

        return view('home.my_post', compact('data'));
    }

    public function my_post_del($id){
        $data= Post::find($id);
        
        $image = $data->image;
        if ($image) {
            $imagePath = public_path('postimage/'.$image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $data->delete();
        
        return redirect()->back()->with('message','Post deleted succesfully!');
    }

    public function post_update_page($id)
    {
        $data = Post::find($id);
        
        return view('home.post_page', compact('data'));
    }

    public function update_post_data(Request $request, $id)
    {
        $data = Post::find($id);
    
        // Aktualizuj tytuł i opis
        $data->title = $request->title;
        $data->description = $request->description;
    
        // Sprawdź czy przesłano nowy obrazek
        if($request->hasFile('image'))
        {
            // Usuń stary obrazek
            if($data->image) {
                $oldImagePath = public_path('postimage/'.$data->image);
                if(file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
            // Zapisz nowy obrazek
            $image = $request->file('image');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            $data->image = $imagename;
        }
    
        // Zapisz wszystkie zmiany
        $data->save();
    
        return redirect()->back()->with('message', 'Post Updated Successfully');
    }
}
