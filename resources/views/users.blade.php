@section('title')
    {{ 'Ραντεβού' }}
@endsection
@include('inc.header')

<body>
    @include('inc.navbar')
    @if (\Session::has('success'))
        <div class="col-md-6 alert alert-success text-center alert-msg">
            <h6>{!! \Session::get('success') !!}</h6>
        </div>
    @endif

    <div class="w-75 m-auto mt-4">
        <form action="{{ route('users') }}" method="POST" class="my-2 my-lg-0 d-flex justify-content-center">
            {{ csrf_field() }}
            <input value="{{ old('search', $search) }}" class="form-control mr-sm-2 w-50" name="query" type="text"
                placeholder="Αναζήτηση" aria-label="Αναζήτηση">
            <button class="btn btn-outline-dark  my-2 my-sm-0 ms-2" type="submit">Αναζήτηση</button>
        </form>
    </div>

    <table class="table table-striped w-75 mx-auto mt-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Ονοματεπώνυμο</th>
                <th scope="col">ΑΦΜ</th>
                <th scope="col">Email</th>
                <th scope="col">Τηλέφωνο</th>
                <th scope="col">Ενέργειες</th>
            </tr>
        </thead>
        <tbody>
            @php
                $counter = 1;
            @endphp
            @foreach ($users as $user)
                <tr>
                    <th scope="row">@php
                        echo $counter++;
                    @endphp</th>
                    <td>{{ $user['username'] }}</td>
                    <td>{{ $user['fullname'] }}</td>
                    <td>{{ $user['afm'] }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td>{{ $user['telephone'] }}</td>
                    <td>
                        <a href="{{ route('sec_create_appointment', $user['id']) }}">
                            <i style="color: #ff8928;" class="bi bi-journal-bookmark-fill"></i>
                        </a>
                        <a style="margin-left: 2rem;" href="{{ route('delete_user', $user['id']) }}">
                            <i style="color: #ff1d58;" class="bi bi-x-square">
                            </i>
                        </a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

</body>

</html>
