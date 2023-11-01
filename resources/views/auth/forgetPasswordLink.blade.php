@section('title')
{{ 'Είσοδος Χρήστη' }}
@endsection
@include('inc.header')

<body>
    @include('inc.navbar')
    <section class="d-flex align-items-center justify-content-center">
        <form action="{{ route('reset.password.post') }}" method="POST" class="form-control border-0 w-50">
            {{ csrf_field() }}
            <input type="hidden" name="token" value="{{ $token }}">
            <h2 class="mb-3">Αλλαγή Κωδικού</h2>
            <label for="email_address" class="form-label">Email</label>
            <input type="text" id="email_address" class="form-control" name="email" required autofocus>
            <label for="password" class="form-label">Κωδικός</label>
            <input type="password" id="password" class="form-control" name="password" required autofocus>
            <label for="password-confirm" class="form-label">Επιβεβαιώση κωδικού</label>
            <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autofocus>
            <div class="d-flex justify-content-between align-items-center mt-2">
                <button style="background-color: #80ceca;" class="btn text-white" type="submit">Αλλαγή</button>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger mt-2">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </form>
    </section>
    @include('inc.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

</body>

</html>
