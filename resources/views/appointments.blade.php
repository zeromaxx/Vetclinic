@section('title')
{{ 'Ραντεβού' }}
@endsection
@include('inc.header')

<body>
    @include('inc.navbar')
    @if (\Session::has('success_msg'))
    <div class="col-md-6 alert alert-success text-center alert-msg">
        <h6>{!! \Session::get('success_msg') !!}</h6>
    </div>
    @endif

    <table class="table table-striped w-75 mx-auto mt-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Ημερομηνία</th>
                <th scope="col">Ώρα</th>
                <th scope="col">Πελάτης</th>
                @if (Auth::check() && Auth::user()->role == 'secretary')
                <th scope="col">Επιβεβαιώση</th>
                <th scope="col">Ενέργειες</th>
                @endif
                @if (Auth::check() && Auth::user()->role == 'doctor')
                <th scope="col">Κατοικίδιο</th>
                <th scope="col">Προσθήκη Εξέτασης</th>
                <th scope="col">Εξετάσεις</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @php
            $counter = 1;
            @endphp
            @foreach ($appointments as $appointment)
            <tr>
                <th style="vertical-align: middle">@php
                    echo $counter++;
                    @endphp</th>
                <td>{{ $appointment['schedule_date'] }}</td>
                <td>{{ $appointment['time'] }}</td>
                <td>{{ $appointment['user']['fullname'] ?? 'Ο χρήστης έχει διαγραφεί' }}</td>
                @if (Auth::check() && Auth::user()->role == 'secretary')
                <td>
                    @if (!is_null($appointment['user_id']) && $appointment['status'] == 'pending')
                    <a href="{{ route('confirm_appointment', $appointment['id']) }}" class="btn btn-primary">Επιβεβαιώση κράτησης
                    </a>
                    @elseif ($appointment['status'] == 'confirmed')
                    Επιβεβαιώθηκε
                    @elseif ($appointment['status'] == 'cancelled')
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
                @endif

                @if (Auth::check() && Auth::user()->role == 'doctor')
                <td>{{ $appointment['pet']['name'] ?? 'Το κατοικίδιο έχει διαγραφεί' }}</td>
                <td>
                    @isset($appointment['pet']['name'])
                    @isset($appointment['user']['fullname'])
                    <a href="{{ route('add_examination', [$appointment['pet_id'], $appointment['id']]) }}">
                        <i class="bi bi-journal-medical">
                        </i>
                    </a>
                    @else
                    -
                    @endisset
                    @else
                    -
                    @endisset
                </td>
                <td>
                    @isset($appointment['pet']['name'])
                    @isset($appointment['user']['fullname'])
                    @php
                    $total = 0;
                    @endphp
                    @foreach ($appointment['petexamination'] as $item)
                    {{ $item['examination']['type'] }}
                    <a class="text-danger" href="{{ route('remove_examination', $item['id']) }}">&times;</a>
                    <p style="display:none">{{ $total += $item['total'] }} </p>
                    <br />
                    @endforeach
                    @if ($total != 0)
                    <b>Σύνολο: </b>
                    <span>
                        @php
                        echo $total . '&euro;';
                        @endphp
                    </span>
                    @endif
                    @else
                    -
                    @endisset
                    @else
                    -
                    @endisset

                </td>
                @endif
            </tr>
            @endforeach

        </tbody>
    </table>
    @include('inc.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

</body>

</html>
