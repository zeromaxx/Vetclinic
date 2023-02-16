@section('title')
    {{ 'Δημιουργία Ραντεβού' }}
@endsection
@include('inc.header')

<body>
    @include('inc.navbar')
    <section class="d-flex align-items-center justify-content-center">
        <form action="{{ route('submit_sec_create_appointment') }}" method="POST" class="form-control border-0 w-50">
            {{ csrf_field() }}
            <input type="hidden" name="user_id" value="{{ $user_id }}">
            <h2 class="mb-3 text-center">Δημιουργία νέου Ραντεβού</h2>
            <label for="schedule_date" class="form-label">Ημερομηνία</label>
            <input required type="date" class="form-control mb-3" name="schedule_date">
            <label for="start_time" class="form-label">Ώρα</label>
            <div id="hours-container">
                <input hidden value="" id="hour-value" name="time">
            </div>
            <p class="alert-hour text-danger"></p>
            <label for="end_time" class="form-label">Κατοικίδια</label>
            <select name="examinationId" class="mb-3 form-select">
                @foreach ($pets as $pet)
                    <option value="{{ $pet['id'] }}">{{ $pet['name'] }}</option>
                @endforeach
            </select>
            <div class="d-flex justify-content-between align-items-center mt-2">
                <button style="background-color: #80ceca;" class="btn text-white" type="submit">Δημιουργία</button>
            </div>
            @if (session()->has('error_msg'))
                <div class="alert alert-danger message text-center mt-2" role="alert">{{ session('error_msg') }}</div>
            @endif
            @if (session()->has('success'))
                <div class="alert alert-success message text-center mt-2" role="alert">{{ session('success') }}
                </div>
            @endif
        </form>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
    <script>
        const hourValue = document.querySelector('#hour-value');
        console.log(hourValue.value)
        const hours = [
            '08:00-08:30',
            '08:30-09:00',
            '09:00-09:30',
            '09:30-10:00',
            '10:00-10:30',
            '10:30-11:00',
            '11:00-11:30',
            '11:30-12:00',
            '12:00-12:30',
            '12:30-13:00',
            '13:00-13:30',
            '13:30-14:00',
            '14:00-14:30',
            '14:30-15:00',
            '15:00-15:30',
            '15:30-16:00'
        ];
        $(document).ready(function(event) {
            hours.forEach((hour) => {
                $('#hours-container').append(`<span class="hour">${hour}</span>`);

            })

            $('#hours-container').click((e) => {
                const clicked = e.target.closest(".hour");
                if (clicked && !e.target.classList.contains('selected-hour')) {
                    document.querySelectorAll(".hour.selected-hour").forEach((c) => c.classList.remove(
                        "selected-hour"));
                    clicked.classList.add("selected-hour");
                    hourValue.value = clicked.innerHTML
                } else {
                    e.target.classList.remove('selected-hour')
                }


            })

            document.querySelector("form").addEventListener("submit", function(event) {
                if (hourValue.value === "") {
                    event.preventDefault();
                    $('.alert-hour').text('Παρακαλώ διαλέχτε ώρα.')
                }

            });

        })
    </script>

</body>

</html>
