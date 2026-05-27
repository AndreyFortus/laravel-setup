<?php

namespace App\Http\Controllers;

use App\Services\ExternalTaskService;
use Illuminate\Http\Request;

class ExternalApiController extends Controller
{
    protected $externalTaskService;

    public function __construct(ExternalTaskService $externalTaskService)
    {
        $this->externalTaskService = $externalTaskService;
    }

    public function posts()
    {
        $posts = $this->externalTaskService->getPosts();
        return response()->json($posts);
    }

    public function show($id)
    {
        $post = $this->externalTaskService->getPostById($id);
        return response()->json($post);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'userId' => 'required|integer',
        ]);

        $result = $this->externalTaskService->createPost($validated);
        return response()->json($result);
    }
}
