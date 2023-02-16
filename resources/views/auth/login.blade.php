@section('title')
    {{ 'Είσοδος Χρήστη' }}
@endsection
@include('inc.header')

<body>
    @include('inc.navbar')
    <section class="d-flex align-items-center justify-content-center">
        <form action="{{ route('process_login') }}" method="POST" class="form-control border-0 w-50">
            {{ csrf_field() }}
            <h2 class="mb-3">Είσοδος</h2>
            <label for="username" class="form-label">Username</label>
            <input required type="text" class="form-control mb-3" name="username">
            <label for="psw" class="form-label">Επώνυμο</label>
            <input required type="password" class="form-control" name="password">
            <div class="d-flex justify-content-between align-items-center mt-2">
                <button style="background-color: #80ceca;" class="btn text-white" type="submit">Είσοδος</button>
                 <a style="color: #b4b4b4;" href="{{ route('forget.password.get') }}">Ξέχασες τον κωδικό σου?</a>
            </div>
            <p class="m-1">Δέν έχετε λογαριασμό ?</p>
            <a href="{{ route('register') }}">Εγγραφή</a>
            @if (session()->has('error_msg'))
                <div class="alert alert-danger message text-center mt-2" role="alert">{{ session('error_msg') }}</div>
            @endif
            @if (session()->has('success_msg'))
                <div class="alert alert-success message text-center mt-2" role="alert">{{ session('success_msg') }}</div>
            @endif
        </form>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

</body>

</html>
