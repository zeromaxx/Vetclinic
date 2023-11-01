@section('title')
{{ 'Ραντεβού' }}
@endsection
@include('inc.header')

<body>
    @include('inc.navbar')
    <div class="container mt-4 mb-4" style="max-width: 1600px">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Ονοματεπώνυμο Χρήστη</th>
                    <th>Εξετάσεις</th>
                    <th>Κατοικίδιο</th>
                    <th>Σχόλια</th>
                    <th>Ημερομηνία & Ώρα</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $appointment)
                <tr>
                    <td>{{ $appointment['user']['fullname'] ?? 'Ο χρήστης έχει διαγραφεί' }}</td>
                    <td>
                        @if (!empty($appointment['petexamination']))
                        @foreach ($appointment['petexamination'] as $item)
                        {{ $item['examination']['type'] }}<br />
                        @endforeach
                        @else
                        Δεν έχει πραγρατοιποιθεί καμία εξέταση ακόμη
                        @endif
                    </td>
                    <td>{{ $appointment['pet']['name'] ?? 'Το κατοικίδιο έχει διαγραφεί' }}</td>
                    <td>
                        @foreach ($appointment['petexamination'] as $item)
                        {{ $item['comments'] }}<br />
                        @endforeach
                    </td>
                    <td>{{ $appointment['schedule_date'] }} | {{ $appointment['time'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    @include('inc.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

</body>

</html>
