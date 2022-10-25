@extends('base')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($users as $user)
            
                <div class="col-md-3 mb-1">
                    <div class="card p3 {{ $user->gender === 'female' ? 'female' : 'male' }}">
                        <div class="">
                                <ul class="text-center">
                            <a class="text-dark text-center" style="text-decoration: none; font-size: 25px; font-weight: bold; align-items: center" href="{{ url('users', ['id' => $user->id]) }}">{{ $user->name }}</a>
                                </ul>
                            <p class="text-light text-center">Posts: {{ $user->posts()->count() }}</p>
                        </div>
                    </div>

                </div>
            @endforeach
            <div class="d-flex justify-content-start">
                {{ $users->links() }}
            </div>
        </div>
    </div>

    <style>
        .female {
            background-color: rgb(0, 177, 6);
        }

        .male {
            background-color: rgb(206, 142, 5);
        }
    </style>
@endsection
