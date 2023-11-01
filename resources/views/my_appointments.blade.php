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
    <table class="table table-striped w-75 mx-auto mt-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Ημερομηνία</th>
                <th scope="col">Ώρα</th>
                <th scope="col">Κατοικίδιο</th>
                <th scope="col">Κατάσταση</th>
                <th scope="col">Ενέργειες</th>
            </tr>
        </thead>
        <tbody>
            @php
            $count = 1;
            @endphp
            @foreach ($appointments as $appointment)
            <tr>
                <th scope="row">@php
                    echo $count++;
                    @endphp
                </th>
                <td>{{ $appointment['schedule_date'] }}</td>
                <td>{{ $appointment['time'] }}</td>
                <td>{{ $appointment['pet']['name'] }}</td>
                <td>
                    @if (!is_null($appointment['user_id']) && $appointment['status'] == 'pending')
                    Μη Επιβεβαιωμένο
                    @elseif ($appointment['status'] == 'confirmed')
                    Επιβεβαιώθηκε
                    @else
                    Ακυρώθηκε
                    @endif
                </td>
                <td>
                    @if ($appointment['status'] == 'confirmed' || $appointment['status'] == 'pending')
                    <a href="{{ route('edit_appointment', $appointment['id']) }}">
                        <i style="color: #ffde22;" class="bi bi-pencil-fill">
                        </i>
                    </a>
                    <a style="margin-left: 2rem;" href="{{ route('cancel_appointment', $appointment['id']) }}">
                        <i style="color: #ff1d58;" class="bi bi-x-square">
                        </i>
                    </a>
                    @endif
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    @include('inc.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

</body>

</html>
