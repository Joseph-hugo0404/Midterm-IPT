@extends('base')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($users as $user)
                <div class="col-md-3 mb-1">

                    <div class="card p3 {{ $user->gender === 'female' ? 'female' : 'male' }}">
                        <div class="">
                            <h4 class="text-center p-2">{{ $user->name }}</h4>
                        

                            <p class="text-light text-center">Total Posts: {{ $user->posts()->count() }}</p>
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
            background-color: rgb(231, 133, 145);
        }

        .male {
            background-color: rgb(206, 142, 5);
        }
    </style>
@endsection
