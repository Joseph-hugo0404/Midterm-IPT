@extends('base')

@section('content')
    <div class="container">

        <div class="d-flex justify-content-end">
            {{ $posts->links() }}
        </div> 

        <button class="nav-item dropdown" style="width: 120px; top: -5px; left: 600px">
            <a class="nav-link dropdown-toggle text-dark" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                Categories
            </a>
            <ul class="dropdown-menu">
                @foreach (App\Models\Category::whereHas('posts')->get()->sortBy('category') as $category)
                    <li><a class="dropdown-item"
                            href="{{ url('categories', ['id' => $category->id]) }}">{{ $category->category }}</a>
                    </li>
                @endforeach
            </ul>
        </button>

                <h1 class="text-light text-end" style="font-size:20px; font-weight:400;">
                    {{ __($category->category . ' Posts') }}</h1>

            <div class="row" style="height: 100vh; overflow: auto">
                @foreach ($posts as $post)
                    <div class="col-md-4 ">

                        <div class="card {{ $post->user->gender === 'female' ? 'female' : 'male' }}">
                            <div class="card">
                                <nav class="navbar navbar-expand-lg text-info mb-2">
                                    <div class="container-fluid">
                                            {{ $post->user->name }}</a>

                                        <div class="collapse navbar-collapse" id="navbarNavAlt">
                                            <div class="navbar-nav ms-auto">
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        {{ $post->category->category }}
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        @foreach (App\Models\User::byCategory($post->category_id) as $user)
                                                            <li><a class="dropdown-item"
                                                                    href="{{ url('users', ['id' => $user->id]) }}">{{ $user->name }}</a>
                                                            </li>
                                                        @endforeach

                                                    </ul>
                                                </li>


                                            </div>
                                        </div>
                                    </div>
                                </nav>

                            </div>
                            <div class="card mx-auto mt-3 mb-4" style="height: 20vh; width:390px;">
                                <div class="card-body bg-secondary rounded">
                                    <h4 class="text-light" style="font-weight:400; font-size:16px;">{{ $post->post }}</h4>
                                </div>
                            </div>

                            <div class="footer">

                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
    </div>
    <style>
        .female {
            background-color: cyan;
        }

        .male {
            background-color: lightblue;
        }
    </style>
@endsection
