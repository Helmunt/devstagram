<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {

        //retorrnando el listado de los posts pero filtrado por el usuario usando model routing bindig
        $posts = Post::where('user_id', $user->id)->paginate(4);


        return view('dashboard', [
            'user' => $user,
            //Aqui creamos la llave de post para mostrarlo en la vista dashboard
            'posts'=> $posts,
        ]);
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required'
        ]);

        //Agregando la publicación a la Base de Datos

        //Post::create([
        //    'titulo' => $request->titulo,
        //    'descripcion' => $request->descripcion,
        //    'imagen'=> $request->imagen,
        //    'user_id' => auth()->user()->id
        //]);

        //Esta es otro forma de hacer insert a la Base de Datos
        //$post = new Post;
        //$post->titulo = $request->titulo;
        //$post->descripcion = $request->descripcion;
        //$post->imagen = $request->imagen;
        //$post->user_id = auth()->user()->id;
        //$post->save();

        //Otra forma más de crear los post al estilo Laravel, pero usando las relaciones de los modelos
        $request->user()->posts()->create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen'=> $request->imagen,
            'user_id' => auth()->user()->id
        ]);

        //Regresamos al usuario a su muro con su propio nombre
        return redirect()->route('posts.index', auth()->user()->username);
    }
}
