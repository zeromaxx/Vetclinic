@section('title')
{{ 'Αρχική' }}
@endsection
@include('inc.header')

<body>
    @include('inc.navbar')
    <section class="d-flex align-items-center justify-content-center">
        <form action="{{ route('submit_add_pet') }}" method="POST" class="form-control border-0 w-50">
            {{ csrf_field() }}
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <label for="pet_name" class="form-label">Όνομα κατοικιδίου</label>
            <input required type="text" name="pet_name" class="form-control mb-3">
            <label for="weight" class="form-label">Βάρος</label>
            <input required type="number" name="weight" class="form-control mb-3">
            <label for="animal_type">Είδος κατοικιδίου</label>
            <br class="mb-2">
            <select name="animal_type" class="form-select mb-3">
                @foreach ($animals as $animal)
                <option value="{{ $animal['id'] }}">{{ $animal['type'] }}</option>
                @endforeach
            </select>
            <div class="d-flex justify-content-between align-items-center mt-2">
                <button style="background-color: #80ceca;" class="btn text-white" type="submit">Προσθήκη</button>
            </div>
            @if (session()->has('success_msg'))
            <div class="alert alert-success message text-center mt-2" role="alert">{{ session('success_msg') }}
            </div>
            @endif
        </form>
    </section>
    @include('inc.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

</body>

</html>
