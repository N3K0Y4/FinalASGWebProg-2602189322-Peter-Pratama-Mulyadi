<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="text-center" style="height: 5rem">
        <H1>Registration</H1>
    </div>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container bg-primary-subtle" style="height: 50rem; width: 75rem">
        <form method="POST" action="{{ url('/register') }}" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="input_name" value="{{ old('name') }}"
                    required>
            </div>
            <div class="col-md-12">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" id="input_email" value="{{ old('email') }}"
                    required>
            </div>
            <div class="col-md-12">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="input_password" required>
            </div>
            <div class="col-md-12">
                <label for="password_confirmation" class="form-label">Password Confirmation</label>
                <input type="password" class="form-control" name="password_confirmation"
                    id="input_password_confirmation" required>
            </div>
            <div class="col-md-12">
                <label for="gender">Gender</label>
                <select name="gender" id="input_gender" required>
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>
            {{-- <div class="col-md-12">
                <label for="instagramUsername" class="form-label">Instagram Username</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input type="text" class="form-control" id="input_instagram_username"
                        aria-describedby="inputGroupPrepend" required>
                </div>
            </div> --}}
            <div class="col-md-12">
                <label for="instagram_username" class="form-label">Instagram Username</label>
                <input type="text" class="form-control" name="instagram_username" id="input_instagram_username"
                    value="{{ old('instagram_username') }}" required>
            </div>
            <div class="col-md-12">
                <label for="hobby">Hobby</label>
                <div>
                    <input type="checkbox" name="hobby[]" value="Work">Work
                </div>
                <div>
                    <input type="checkbox" name="hobby[]" value="Sleep">Sleep
                </div>
                <div>
                    <input type="checkbox" name="hobby[]" value="Play">Play
                </div>
                <div>
                    <input type="checkbox" name="hobby[]" value="Study">Study
                </div>
                <div>
                    <input type="checkbox" name="hobby[]" value="Cook">Cook
                </div>
            </div>
            <div class="col-md-12">
                <label for="mobile_number" class="form-label">Mobile Number</label>
                <input type="text" class="form-control" name="mobile_number" id="input_mobile_number"
                    value="{{ old('mobile_number') }}" required>
            </div>
            <div class="col-md-12 text-center">
                <button class="btn btn-primary" type="submit">Register</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
