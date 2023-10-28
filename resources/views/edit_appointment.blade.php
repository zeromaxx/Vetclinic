@section('title')
    {{ 'Ενημέρωση Ραντεβού' }}
@endsection
@include('inc.header')

<body>
    @include('inc.navbar')
    <section class="d-flex align-items-center justify-content-center">
        <form action="{{ route('update_appointment', $appointment['id']) }}" method="POST" class="border-0 w-50">
            @method('PATCH')
            {{ csrf_field() }}
            <h2 class="mb-3 text-center">Τροποποίηση Ραντεβού</h2>
            <div class="row justify-content-center ">
                <div class="col-8">
                    <label for="schedule_date" class="form-label">Όνοματεπώνυμο</label>
                    <input value="{{ $appointment['schedule_date'] }}" required type="text" class="form-control mb-3"
                        name="schedule_date">
                    <label for="time" class="form-label">Ώρα</label>
                    <input value="{{ $appointment['time'] }}" required type="text" class="form-control mb-3"
                        name="time">
                </div>
            </div>
            <div class="d-flex justify-content-center mt-2">
                <button style="background-color: #80ceca;" class="btn text-white w-50" type="submit">Ενημέρωση</button>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

</body>

</html>
