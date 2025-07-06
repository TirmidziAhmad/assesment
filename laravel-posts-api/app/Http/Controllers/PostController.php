<?php

namespace App\Http\Controllers;

use App\Models\Post; 
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException; 

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * Handles GET /api/posts
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        // Get the number of items per page from the request, default to 10
        $perPage = $request->query('per_page', 10);

        // Validate that per_page is a positive integer
        if (!is_numeric($perPage) || $perPage <= 0) {
            return response()->json([
                'message' => 'Invalid per_page value. Must be a positive integer.'
            ], 400);
        }

        // Retrieve all posts with pagination
        // The paginate method automatically handles the 'page' query parameter
        $posts = Post::paginate($perPage);

        // Return the paginated posts as a JSON response
        return response()->json($posts);
    }

    /**
     * Store a newly created resource in storage.
     * Handles POST /api/posts
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'title' => 'required|string|max:255', 
                'content' => 'required|string',       
            ]);

            // Create a new Post instance with the validated data
            $post = Post::create($validatedData);

            // Return the newly created post with a 201 Created status code
            return response()->json($post, 201);
        } catch (ValidationException $e) {
            // Return validation errors if validation fails
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            // Catch any other unexpected errors
            return response()->json([
                'message' => 'An error occurred while creating the post.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     * Handles GET /api/posts/{id}
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        // Find the post by its ID, or throw a 404 exception if not found
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        // Return the found post as a JSON response
        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     * Handles PUT /api/posts/{id}
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        // Find the post by its ID
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        try {
            // Validate the incoming request data for update
            $validatedData = $request->validate([
                'title' => 'sometimes|required|string|max:255', 
                'content' => 'sometimes|required|string',             
            ]);

            // Update the post with the validated data
            $post->update($validatedData);

            // Return the updated post as a JSON response
            return response()->json($post);
        } catch (ValidationException $e) {
            // Return validation errors if validation fails
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            // Catch any other unexpected errors
            return response()->json([
                'message' => 'An error occurred while updating the post.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     * Handles DELETE /api/posts/{id}
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        // Find the post by its ID
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        try {
            // Delete the post
            $post->delete();

            // Return a success message with a 204 No Content status code
            return response()->json(null, 204);
        } catch (\Exception $e) {
            // Catch any other unexpected errors
            return response()->json([
                'message' => 'An error occurred while deleting the post.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}