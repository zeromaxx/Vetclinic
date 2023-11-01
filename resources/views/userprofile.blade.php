@section('title')
{{ 'Προφίλ Χρήστη' }}
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
        <div class="col col-lg-12 mb-4 mb-lg-0 w-75">
            <div class="card mb-3" style="border-radius: .5rem;">
                <div class="row g-0">
                    <div style="background: #80ceca" class="col-md-4 text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                        <img src="{{ asset('images/user_img.png') }}" class="img-fluid my-5" />
                        <h5>{{ $user['fullname'] }}</h5>
                        <p>{{ $user['username'] }}</p>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between">
                                <h6>Πληροφορίες Χρήστη</h6>
                                <a href="{{ route('edit_user', $user['id']) }}">
                                    <i style="color: #ffde22;margin-left:1rem" class="bi bi-pencil-fill me-1">
                                    </i>
                                </a>
                            </div>
                            <hr class="mt-0 mb-4">
                            <div class="row pt-1">
                                <div class="col-6 mb-3">
                                    <h6>Email</h6>
                                    <p class="text-muted">{{ $user['email'] }}</p>
                                </div>
                                <div class="col-6 mb-3">
                                    <h6 class="">Τηλέφωνο</h6>
                                    <p class="text-muted">{{ $user['telephone'] }}</p>
                                </div>
                                <div class="col-6 mb-3">
                                    <h6 class="">ΑΦΜ</h6>
                                    <p class="text-muted">{{ $user['afm'] }}</p>
                                </div>
                            </div>
                            <h6>Κατοικίδια</h6>
                            <hr class="mt-0 mb-4">
                            <div class="row pt-1">
                                @foreach ($user_pets as $user_pet)
                                <dl>
                                    <dt>{{ $user_pet['name'] }}</dt>
                                    <a href="{{ route('delete_pet', $user_pet['id']) }}">
                                        <i style="color: #ff1d58" class="bi bi-trash3-fill">
                                        </i>
                                    </a>
                                    <a href="{{ route('edit_pet', $user_pet['id']) }}">
                                        <i style="color: #ffde22;margin-left:1rem" class="bi bi-pencil-fill me-1">
                                        </i>
                                    </a>
                                </dl>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('inc.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

</body>

</html>
