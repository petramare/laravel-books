<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthorController extends Controller
{
    /**
     * displays a list of authors
     */
    public function index()
    {
        $authors = Author::orderBy('id', 'desc')->limit(20)->get();

        return view('admin.authors.index', compact(
            'authors'
        ));
    }

    /**
     * displays a form to create a new author
     */
    public function create()
    {
        $author = new Author;

        return view('admin.authors.create', compact(
            'author'
        ));
    }

    /**
     * stores a new author
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required|unique:authors'
        ]);

        $author = new Author;
        $author->name = $request->post('name');
        $author->slug = $request->post('slug');
        $author->save();

        session()->flash('success_message', 'Author has been successfully saved');

        return redirect()->route('admin.authors');
    }

    /**
     * displays a form to edit an existing author
     */
    public function edit($author_id)
    {
        $author = Author::findOrFail($author_id);

        return view('admin.authors.edit', compact(
            'author'
        ));
    }

    /**
     * updates an existing author
     */
    public function update(Request $request, $author_id)
    {
        $this->validate($request, [
            'name' => 'required',
            'slug' => [
                'required',
                Rule::unique('authors')->ignore($author_id),
            ]
        ]);

        $author = Author::findOrFail($author_id);

        $author->name = $request->post('name');
        $author->slug = $request->post('slug');
        $author->save();

        session()->flash('success_message', 'Author has been successfully saved');

        return redirect()->route('admin.authors.edit', $author->id);
    }
}
