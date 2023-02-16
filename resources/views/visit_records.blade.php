@section('title')
    {{ 'Ραντεβού' }}
@endsection
@include('inc.header')

<body>
    @include('inc.navbar')

    @foreach ($appointments as $appointment)
        <div class="card text-center w-75 mx-auto mt-3 mb-3">
            <div class="card-header">
                {{ $appointment['user']['fullname'] ?? 'Ο χρήστης έχει διαγραφεί' }}
            </div>
            <div class="card-body">
                <h5 class="card-title"><b>Εξετάσεις</b></h5>
                @foreach ($appointment['petexamination'] as $item)
                    {{ $item['examination']['type'] }}
                    <br />
                    <hr>
                    <b>Κατοικίδιο :</b>{{ $appointment['pet']['name'] ?? 'Το κατοικίδιο έχει διαγραφεί' }}
                    <hr>
                    {{ $item['comments'] }}
                    <br />
                @endforeach
            </div>
            <div class="card-footer text-muted">
                {{ $appointment['schedule_date'] }} |
                {{ $appointment['time'] }}
            </div>
        </div>
    @endforeach
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

</body>

</html>
