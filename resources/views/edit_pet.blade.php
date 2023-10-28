@section('title')
    {{ 'Ενημέρωση Κατοικιδίου' }}
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
        <form action="{{ route('update_pet', $pet['id']) }}" method="post" class="form-control border-0 w-50">
            @method('PATCH')
            {{ csrf_field() }}
            <h2>Τροποποίηση Προφίλ Κατοικιδίου</h2>
            <label for="pet_name" class="form-label">Όνομα κατοικιδίου</label>
            <input required type="text" name="pet_name" class="form-control mb-3" value="{{ $pet['name'] }}">
            <label for="weight" class="form-label">Βάρος</label>
            <input required type="number" name="weight" class="form-control mb-3" value="{{ $pet['weight'] }}">
            <label for="animal_type">Είδος κατοικιδίου</label>
            <br class="mb-2">
            <select name="animal_type" class="mb-3 form-control">
                @foreach ($animals as $animal)
                    <option {{ $animal['id'] == $pet['animal_id'] ? 'selected' : '' }} value="{{ $animal['id'] }}">
                        {{ $animal['type'] }}</option>
                @endforeach
            </select>
            <div class="d-flex justify-content-between align-items-center mt-2">
                <button style="background-color: #80ceca;" class="btn text-white" type="submit">Ενημέρωση</button>
            </div>
            @if (session()->has('success_msg'))
                <div class="alert alert-success message text-center mt-2" role="alert">{{ session('success_msg') }}
                </div>
            @endif
        </form>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

</body>

</html>
