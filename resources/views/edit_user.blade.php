@section('title')
{{ 'Αρχική' }}
@endsection
@include('inc.header')

<body>
    @include('inc.navbar')
    @if (\Session::has('success'))
    <div class="col-md-6 alert alert-success text-center alert-msg">
        <h6>{!! \Session::get('success') !!}</h6>
    </div>
    @endif
    <section class="d-flex align-items-center justify-content-center">
        <form action="{{ route('update_user', $user['id']) }}" method="POST" class="border-0 w-50">
            @method('PATCH')
            {{ csrf_field() }}
            <h2 class="mb-3">Ενημέρωση Στοιχείων Χρήστη</h2>
            <div class="row">
                <div class="col-6">
                    <label for="name" class="form-label">Όνοματεπώνυμο</label>
                    <input value="{{ $user['fullname'] }}" required type="text" class="form-control mb-3" name="fullname">
                    <label for="afm" class="form-label">ΑΦΜ</label>
                    <input value="{{ $user['afm'] }}" required minlength="9" maxlength="9" type="number" class="form-control mb-3" name="afm">
                </div>
                <div class="col-6">
                    <label for="username" class="form-label">Username</label>
                    <input value="{{ $user['username'] }}" required type="text" class="form-control mb-3" name="username">
                    <label for="email" class="form-label">Email</label>
                    <input value="{{ $user['email'] }}" required type="email" class="form-control mb-3" name="email">
                </div>
                <div class="col-12">
                    <label for="phone" class="form-label">Τηλέφωνο</label>
                    <input value="{{ $user['telephone'] }}" required type="text" class="form-control mb-3" name="phone">
                </div>
            </div>
            <div class="d-block d-md-flex justify-content-between align-items-center mt-2">
                <button style="background-color: #80ceca;" class="btn text-white" type="submit">Ενημέρωση</button>
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
