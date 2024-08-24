<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="text-center" style="height: 5rem">
        <H1>Payment</H1>
    </div>

    <div class="container bg-primary-subtle text-center" style="height: 50rem; width: 75rem">
        <h1>{{ $price }}</h1>

        @if (session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="error-message">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('update_paid') }}">
            @csrf
            <label for="payment_amount">Enter Payment Amount:</label>
            <input type="number" id="payment_amount" name="payment_amount" required>

            <input type="hidden" id="price" name="price" value="{{ $price }}">

            <div class="col-md-12 text-center">
                <button class="btn btn-primary" type="submit">Pay Now!</button>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
