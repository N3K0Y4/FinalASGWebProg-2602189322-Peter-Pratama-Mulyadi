@extends('layout.template')

@section('active_home', 'active')
@section('title', 'Home')

@section('content')

    <div class="container">
        <div class="row">
            @foreach ($data_user as $user)
                <div class="col-md-4 mb-4">
                    <div class="card" style="width: 100%;">
                        <img src="{{ asset('storage/' . $user->profile_path) }}" alt="" srcset=""
                            style="width: 25rem; height: 25rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $user->name }}</h5>
                            <p class="card-text">{{ $user->fields_of_work }}</p>    
                            <form method="POST" action="{{ route('friend-request.store') }}">
                                @csrf
                                <input type="hidden" name="receiver_id" value="{{ $user->id }}">
                                <button type="submit" class="button">Send Request</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
