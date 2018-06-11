<?php

namespace App\Http\Controllers;

use App\Contracts\PostRepositoryInterface;
use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    private $postRepository;

    public function __construct( PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;

    }

    //
    public function index(Request $request)
    {

        $posts =  $this->postRepository->search($request->q);

        return view('search',['posts' => $posts]);
    }
}
