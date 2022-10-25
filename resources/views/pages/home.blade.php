@extends('base')

@section('content')
    <div class="container">
        <div class="row">

            <div class="mx-auto">
                <div class="search" style="position:relative; top: 1px;">
                    <div class="mx-auto" style="width:450px;">
                        <form action="{{ route('posts') }}" method="GET" role="search">
            
                            <div class="input-group">
                                <span class="input-group-btn mr-2 mt-0">
                                    <button class="btn" type="submit" title="Search Post">
                                        <span class="text-dark"></span>
                                    </button>
                                </span>
                                <input type="text" class="form-control mr-2" name="post" placeholder="Search posts" id="post">
                                <a href="{{ route('posts') }}" class=" mt-0">
                                </a>

                                 
                            </div>
                        </form>
                        <button class="nav-item dropdown" style="width: 120px; top: -30px; left: 470px">
                                    <a class="nav-link dropdown-toggle text-dark" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Categories
                                    </a>
                                    <div class="dropdown-menu">
                                        @foreach (App\Models\Category::whereHas('posts')->get()->sortBy('category') as $category)
                                            <li><a class="dropdown-item"
                                                    href="{{ url('categories', ['id' => $category->id]) }}">{{ $category->category }}</a>
                                            </li>
                                        @endforeach
                                        </div>
                        </button>
                    </div>
               </div>
            </div>
  
             
         <div class="card-header">
                <h3 class="text-light text-end" style="font-size:20px; font-weight:400; ">Recent Posts</h3>
            </div>
        <div class="card bg-dark">
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-4 mt-1 mb-1">

                        <div class="card {{ $post->user->gender === 'female' ? 'female' : 'male' }}">
                            
                                <nav class="navbar navbar-expand-lg text-info mb-2">
                                    <div class="container-fluid">
                                            {{ $post->user->name }}</a>

                                        <div class="collapse navbar-collapse" id="navbarNavAlt">
                                            <div class="navbar-nav ms-auto"> 
                                                <li class="nav-item">
                                                    <a class="nav-link text-light" href="#" role="button"
                                                        data-bs-toggle="" aria-expanded="false">
                                                        {{ $post->category->category }}
                                                    </a>
                                                </li>
                                            </div>
                                        </div>
                                    </div>
                                </nav>
                            <div class="" style="height: 20vh;">
                                <div class="text-light">
                                    <h4 style="font-weight:400; font-size:16px;">{{ $post->post }}</h4>
                                </div>
                            </div>


                        </div>

                    </div>
                @endforeach
            </div>
        </div>
        <div class="d-flex mt-1">
                {{ $posts->links() }}
            </div> 
    </div>
</div>

    <style>
        .female {
            background-color: rgb(24, 142, 100);
        }

        .male {
            background-color: rgb(41, 60, 66);

        }
    </style>
@endsection
