@section('title')
    {{ 'Αλλαγή Κωδικού' }}
@endsection
@include('inc.header')

<body>
    @include('inc.navbar')
    <section class="d-flex align-items-center justify-content-center">
        <form action="{{ route('forget.password.post') }}" method="POST" class="form-control border-0 w-50">
            {{ csrf_field() }}
            <h2 class="mb-3">Αλλαγή κωδικού</h2>
            <label for="email_address" class="form-label">Το email σας</label>
            <input type="text" id="email_address" class="form-control" name="email" required autofocus>
            <div class="d-flex justify-content-between align-items-center mt-4">
                <button style="background-color: #80ceca;" class="btn text-white" type="submit">Αποστολή συνδέσμου στο
                    Email σας</button>
            </div>
            @if (Session::has('message'))
                <div class="alert alert-success mt-3" role="alert">
                    {{ Session::get('message') }}
                </div>
            @endif
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger text-center mt-2" role="alert">{{ $error }}</div>
                @endforeach
            @endif
        </form>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

</body>

</html>
