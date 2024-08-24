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
        <H1>Over Payment</H1>
    </div>

    <div class="container bg-primary-subtle text-center" style="height: 50rem; width: 75rem">

        <p>Sorry, you overpaid ${{ number_format($amount, 2) }}. Would you like to enter a balance?</p>

        <form method="POST" action="{{ route('process_overpayment') }}">
            @csrf
            <input type="hidden" name="amount" value="{{ $amount }}">
            <input type="hidden" name="payment_amount" value="{{ $payment_amount }}">
            <input type="hidden" name="price" value="{{ $price }}">

            <button type="submit" name="action" value="accept">Yes, add to wallet</button>
            <button type="submit" name="action" value="decline">No, correct amount</button>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
