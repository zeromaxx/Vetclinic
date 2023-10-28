@section('title')
{{ 'Ραντεβού' }}
@endsection
@include('inc.header')

<body>
    @include('inc.navbar')
    <div class="container">

        <div class="row">
            @foreach ($appointments as $appointment)
            <div class="col-md-4 mt-3 mb-3">
                <div class="card text-center w-100 mx-auto">
                    <div class="card-header">
                        {{ $appointment['user']['fullname'] ?? 'Ο χρήστης έχει διαγραφεί' }}
                    </div>
                    <div class="card-body">
                        @if (!empty($appointment['petexamination']))
                        <h5 class="card-title"><b>Εξετάσεις</b></h5>
                        @else
                        Δεν έχει πραγρατοιποιθεί καμία εξέταση ακόμη
                        @endif
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
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

</body>

</html>
