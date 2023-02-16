@section('title')
    {{ 'Αρχική' }}
@endsection
@include('inc.header')
<body>
    @include('inc.navbar')
    <section>
        <div style="height: 82vh;" class="row w-75 m-auto d-block align-items-center d-md-flex mt-5 mt-md-0">
            <div class="col-md-6">
                <img src="{{ asset('images/doc.jpg') }}" class="img-fluid " alt="">
            </div>
            <div class="col-md-6 mt-3 mt-md-0">
                <h2>Σχετικά με εμάς</h2>
                <p style="color: #80ceca;" class="fw-bold">Ο καλύτερος φίλος του κατοικιδίου σας</p>
                <hr class="divider">
                <p class="lh-lg">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consectetur corporis illum,
                    soluta natus non quam quia nesciunt cupiditate, aut dolorem sed mollitia recusandae qui fuga
                    praesentium assumenda voluptatem commodi in! Debitis necessitatibus commodi nostrum accusamus aut
                    voluptas hic nulla nisi explicabo minima. Ea error voluptatum at veritatis, nesciunt rem commodi?
                </p>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

</body>

</html>
