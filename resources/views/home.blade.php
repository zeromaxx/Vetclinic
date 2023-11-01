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
                <p class="lh-lg">
                    Στην Fluffy Paw, το πάθος μας είναι η υγεία και η ευημερία των αγαπημένων σας κατοικίδιων. Βρισκόμαστε στην πρώτη γραμμή της κτηνιατρικής φροντίδας, διασφαλίζοντας ότι τα ζώα της κοινότητάς μας λαμβάνουν την καλύτερη διαθέσιμη θεραπεία.Η ομάδα μας από αφοσιωμένους και συμπονετικούς επαγγελματίες κτηνιάτρους κατανοεί τον μοναδικό δεσμό μεταξύ των κατοικίδιων ζώων και των ιδιοκτητών τους. Γι' αυτό προσεγγίζουμε κάθε περίπτωση με τη μέγιστη προσοχή, χρησιμοποιώντας διαγνωστικά εργαλεία και θεραπείες τελευταίας τεχνολογίας, σε συνδυασμό με ένα απαλό άγγιγμα.
                </p>
            </div>
        </div>
    </section>
    @include('inc.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

</body>

</html>
