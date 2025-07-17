<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;

use function App\Helpers\deleteFoto;
use function App\Helpers\updateFoto;
use function App\Helpers\uploadFoto;

class BlogController extends Controller
{

    protected $model;

    public function __construct(Blog $blog)
    {
        $this->model = new Repository($blog);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payload = $request->only(['title', 'content', 'is_active']);
        if ($request->hasFile('image')) {
            $payload['image'] = uploadFoto($request->file('image'), 'blog');
        }
        $this->model->create($payload);
        return response()->json(['success' => true], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->model->getModel()::findOrFail($id);
        return response()->json(['success' => true, 'data' => $data], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->model->getModel()::findOrFail($id);
        return response()->json(['success' => true, 'data' => $data], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $payload = $request->only(['title', 'content', 'is_active']);
        // if ($request->hasFile('image')) {
        //     $payload['image'] = updateFoto($blog->image, 'blog', $request->file('image'), 'blog');
        // }
        $this->model->update($payload, $id);
        return response()->json(['success' => $payload], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        if ($blog->image) {
            deleteFoto($blog->image, 'blog');
        }
        $this->model->delete($id);
        return response()->json(['success' => true], 200);
    }

    public function blog()
    {
        $data = $this->model->all();
        return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                $update = '<a href="#" data-bs-toggle="modal" class="btn-edit-blog"
                data-bs-target="#editBlogModal"
                data-id="' . $data->id . '"><span class="badge bg-success">
                <i class="fas fa-edit"></i>
            </span></a>
            <a href="#" data-bs-toggle="modal" class="btn-delete-blog"
                data-bs-target="#deleteBlogModal"
                data-id="' . $data->id . '"><span class="badge bg-danger">
                <i class="fas fa-trash"></i>
            </span></a>
                ';
                return $update;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}