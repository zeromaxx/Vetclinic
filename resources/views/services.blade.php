@section('title')
    {{ 'Είσοδος Χρήστη' }}
@endsection
@include('inc.header')

<body>
    @include('inc.navbar')
    <section>
        <div class="col-sm-12 text-center mt-5">
            <h2>Οι <strong>υπηρεσίες και οι διαδικασίες μας</strong></h2>
            <p style="color: #80ceca;" class="fs-6">ΥΨΗΛΗ ΠΟΙΟΤΗΤΑΣ ΦΡΟΝΤΙΔΑ</p>
            <hr class="divider">
        </div>
        <div class="row w-75  m-auto d-block d-md-flex text-center services">
            <div class="col-md-4">
                <b>Ενδοπαρασίτωση</b>
                <p class="mt-3">Πρόκειται για την μόλυνση των κατοικιδίων από παράσιτα που ζουν εσωτερικά στον οργανισμό τους, όπως οι ταινίες και τα σκουλήκια. Η έγκαιρη διάγνωση και θεραπεία είναι κρίσιμη για την υγεία του ζώου.</p>
                <span class="fw-bold">250$</span>
            </div>
            <div class="col-md-4">
                <b>Εξετάσεις Αίματος</b>
                <p class="mt-3">Διαγνωστικές εξετάσεις που εντοπίζουν ανωμαλίες στο αίμα του κατοικιδίου, βοηθώντας στην παρακολούθηση της γενικής του υγείας και στη διάγνωση πιθανών προβλημάτων.</p>
                <span class="fw-bold">50$</span>
            </div>
            <div class="col-md-4">
                <b>Στειρώσεις</b>
                <p class="mt-3">Χειρουργικές επεμβάσεις που αποσκοπούν στην αναπαραγωγική ακομπλεξία των ζώων, μειώνοντας τους κινδύνους υγείας και προβλημάτων συμπεριφοράς.</p>
                <span class="fw-bold">165$</span>
            </div>
        </div>
        <div class="row w-75  mt-5 mx-auto d-block d-md-flex text-center services">
            <div class="col-md-4">
                <b>Αντιλυσσικό Εμβόλιο</b>
                <p class="mt-3">Εμβόλιο που παρέχει προστασία στα κατοικίδια από τη λύσσα, μια θανατηφόρα νόσο που μπορεί να μεταδοθεί στον άνθρωπο.</p>
                <span class="fw-bold">35$</span>
            </div>
            <div class="col-md-4">
                <b>Εξέταση T4</b>
                <p class="mt-3">Μια εξέταση που μετρά τη συγκέντρωση της θυροξίνης (T4) στο αίμα, βοηθώντας στη διάγνωση προβλημάτων του θυροειδούς στα ζώα.</p>
                <span class="fw-bold">95$</span>
            </div>
            <div class="col-md-4">
                <b>Βιοχημικός Έλεγχος</b>
                <p class="mt-3">Εξετάσεις που αναλύουν διάφορες χημικές ουσίες στο αίμα του ζώου, προσφέροντας σημαντικές πληροφορίες για τη λειτουργία των ζωτικών οργάνων του.</p>
                <span class="fw-bold">125$</span>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

</body>

</html>
