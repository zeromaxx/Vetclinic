@section('title')
{{ 'Είσοδος Χρήστη' }}
@endsection
@include('inc.header')

<body>
    @include('inc.navbar')
    <section class="d-flex align-items-center justify-content-center">
        <form action="{{ route('process_register') }}" method="POST" class="border-0 w-50">
            {{ csrf_field() }}
            <h2 class="mb-3">Εγγραφή Χρήστη</h2>
            <div class="row">
                <div class="col-6">
                    <label for="name" class="form-label">Όνομα</label>
                    <input value="{{ old('name') }}" required type="text" class="form-control mb-3" name="name">
                    <label for="surname" class="form-label">Επίθετο</label>
                    <input value="{{ old('surname') }}" required type="text" class="form-control mb-3" name="surname">
                    <label for="afm" class="form-label">ΑΦΜ</label>
                    <input value="{{ old('afm') }}" required minlength="9" maxlength="9" type="number" class="form-control mb-3" name="afm">
                </div>
                <div class="col-6">
                    <label for="username" class="form-label">Username</label>
                    <input value="{{ old('username') }}" required type="text" class="form-control mb-3" name="username">
                    <label for="password" class="form-label">Κωδικός</label>
                    <input required type="password" class="form-control mb-3" name="password">
                    <label for="email" class="form-label">Email</label>
                    <input value="{{ old('email') }}" required type="email" class="form-control mb-3" name="email">
                </div>
                <div class="col-12">
                    <label for="phone" class="form-label">Τηλέφωνο</label>
                    <input value="{{ old('phone') }}" required type="text" class="form-control mb-3" name="phone">
                </div>
            </div>
            <div class="d-block d-md-flex justify-content-between align-items-center mt-2">
                <button style="background-color: #80ceca;" class="btn text-white" type="submit">Εγγραφή</button>
            </div>
            <p class="m-1">Έχετε λογαριασμό ?</p>
            <a href="{{ route('login') }}">Είσοδος</a>
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
