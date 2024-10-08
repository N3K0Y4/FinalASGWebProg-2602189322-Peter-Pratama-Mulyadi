@extends('layout.template')

@section('title', 'Request')
@section('active_request', 'active')

@section('content')
    @if (session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif
    <div class="container">
        <div class="row">
            @foreach ($friendRequest as $user)
                <div class="col-md-4 mb-4">
                    <div class="card" style="width: 100%;">
                        <img src="{{ asset('storage/' . $user->profile_path) }}" alt="" srcset=""
                            style="width: 25rem; height: 25rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $user->name }}</h5>
                            <p class="card-text">{{ $user->fields_of_work }}</p>
                            <form method="POST" action="{{ route('friend.store') }}">
                                @csrf
                                <input type="hidden" name="request_id" value="{{ $user->request_id }}">
                                <input type="hidden" name="friend_id" value="{{ $user->id }}">
                                <button type="submit" class="button btn-primary">Accept</button>
                            </form>
                            <form method="POST" action="{{ route('friend-request.destroy', $user->request_id) }}">
                                @method('delete')
                                @csrf
                                <button type="submit" class="button btn-danger">Decline</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection