@section('title')
    {{ 'Ιστορικό Πελατών' }}
@endsection
@include('inc.header')

<body>
    @include('inc.navbar')

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ιστορικό Εξετάσεων Κατοικίδιου</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div id="output"></div>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-striped w-75 mx-auto mt-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Πελάτης</th>
                <th scope="col">Κατοικίδια</th>
            </tr>
        </thead>
        <tbody>
            @php
                $count = 1;
            @endphp
            @foreach ($records as $record)
                <tr>
                    <th scope="row">@php
                        echo $count++;
                    @endphp
                    </th>
                    <td>
                        {{ $record['fullname'] }}
                    </td>
                    <td>
                        @foreach ($record['pets'] as $pet)
                            {{ $pet['name'] }}

                            <a data-toggle="modal" data-target="#exampleModal" class="petid"
                                data-petid={{ $pet['id'] }}>
                                <i class="bi bi-book"></i>
                            </a>
                            <br />
                        @endforeach
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script>
        $('.petid').click(function() {
            $.ajax({
                method: "GET",
                url: `/show_exam_record/${$(this).data("petid")}`,
                success: function(data) {
                    if (data.length === 0) {
                        $('#output').append('Δεν βρέθηκαν εξετάσεις.');
                    }
                    $.each(data, function(index, value) {

                        $('#output').append(value.examination.type + '<br>');

                    });
                    $("#exampleModal").modal("show");
                },
                error: function(data, error) {
                    console.log(error)
                }
            });
        })
        $('.close').click(function() {
            $('#output').empty();
        })
    </script>

</body>

</html>
