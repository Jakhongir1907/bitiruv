<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return response()->json([
            'message' => "All categories",
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->all());

        return response()->json([
            'message' => "Category created successfully!" ,
            'category' => $category
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id) :JsonResponse
    {
        $category = Category::find($id);

        if(!$category){
            return response()->json([
                'message' => "Record not found!" ,
            ]);
        }
        return response()->json([
            'message' => "Category" ,
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, $id) :JsonResponse
    {
        $category = Category::find($id);

        $category->update($request->all());

        return response()->json([
            'message' => "Category updated successfully!" ,
            'category' => $category
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id) :JsonResponse
    {
        $category = Category::find($id);

        $category->delete();
        return response()->json([
            'message' => "Category has been deleted successfully!" ,
        ]);
    }
}
