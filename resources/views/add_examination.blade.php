@section('title')
{{ 'Προσθήκη Εξέτασης' }}
@endsection
@include('inc.header')
<h3 style="color:red"></h3>
<body>
    @include('inc.navbar')
    @if (\Session::has('success'))
    <div class="col-md-6 alert alert-success text-center alert-msg">
        <h6>{!! \Session::get('success') !!}</h6>
    </div>
    @endif
    <section class="d-flex align-items-center justify-content-center">
        <form action="{{ route('submit_examination') }}" method="POST" class="form-control border-0 w-50">
            {{ csrf_field() }}
            <h2 class="mb-3 text-center">Προσθήκη Εξέτασης</h2>
            <input type="hidden" name="petId" value="{{ $pet_id }}">
            <input type="hidden" name="appointment_id" value="{{ $appointment_id }}">
            <label for="comments" class="form-label">Εξέταση</label>
            <select name="examinationId" class="mb-3 form-select">
                @foreach ($examinations as $examination)
                <option value="{{ $examination['id'] }}">{{ $examination['type'] }}
                    ({{ $examination['price'] }} &euro;)
                </option>
                @endforeach
            </select>
            <label for="comments" class="form-label">Σχόλια</label>
            <textarea required class="form-control" name="comments"></textarea>
            <div class="d-flex justify-content-between align-items-center mt-2">
                <button style="background-color: #80ceca;" class="btn text-white" type="submit">Προσθήκη</button>
            </div>
            @if (session()->has('error_msg'))
            <div class="alert alert-danger message text-center mt-2" role="alert">{{ session('error_msg') }}</div>
            @endif
            @if (session()->has('success'))
            <div class="alert alert-success message text-center mt-2" role="alert">{{ session('success') }}
            </div>
            @endif
            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger text-center mt-2" role="alert">{{ $error }}</div>
            @endforeach
            @endif
        </form>
    </section>
    @include('inc.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

</body>

</html>
