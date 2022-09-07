<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
// Menghapus Gambar dari Server
use Illuminate\Support\Facades\Storage;
// Menggunakan FormRequest untuk validasi
use App\Http\Requests\PostRequestStore;
use App\Http\Requests\PostRequestUpdate;
// Menggunakan Trait agar functionnya menjadi reusable
use App\Traits\HasImage;

class PostController extends Controller
{
    // inheritence atau turunan,sehingga bisa menggunakan function dari Traits disini
    use HasImage;
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get posts
        $posts = Post::latest()->paginate(5);

        //render view with posts
        // compact adalah command php untuk mengirim data posts ke view
        return view('posts.index', compact('posts'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        // show view of views/posts/create
        return view('posts.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(PostRequestStore $request)
    {
        //upload image
        $image = $this->uploadImage($request, $path = 'public/posts');

        //create post
        Post::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'content'   => $request->content
        ]);

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * edit
     *
     * @param  mixed $post
     * @return void
     */
    // Parameter Post $post untuk mengambil ID dari model Post
    public function edit(Post $post)
    {
        // ketika sudah didapatkan kita kirim $post melalui compact ke view
        return view('posts.edit', compact('post'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(PostRequestUpdate $request, Post $post)
    {
        //check if image is uploaded
        if ($request->hasFile('image')) {
            //delete old image
            Storage::delete('public/posts/' . $post->image);

            // upload image using traits
            $image = $this->uploadImage($request, $path = 'public/posts');

            //update post with new image
            $post->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'content'   => $request->content
            ]);
        } else {

            //update post without image
            $post->update([
                'title'     => $request->title,
                'content'   => $request->content
            ]);
        }

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy(Post $post)
    {
        //delete image
        Storage::delete('public/posts/' . $post->image);

        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
