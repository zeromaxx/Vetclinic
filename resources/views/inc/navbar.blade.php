   <nav style="background-color: #80ceca;" class="navbar navbar-expand-lg p-3">
       <div class="container-fluid w-75">
           <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
               <div class="navbar-nav w-100">
                   <a href="{{ route('home') }}" class="text-white text-decoration-none">
                       <span class="fs-4">Fluffy</span>
                       <span class="fw-bold text-dark fs-3 ms-2">Paw</span>
                   </a>
                   @if (Auth::check() && Auth::user()->role == 'customer')
                   <a class="ms-4 {{ request()->is('add_pet') ? 'active-link nav-link fs-6' : 'nav-link fs-6' }}" href="{{ route('add_pet') }}">Προσθήκη Κατοικιδίου</a>
                   <a class="{{ request()->is('services') ? 'active-link nav-link fs-6' : 'nav-link fs-6' }}" href="{{ route('services') }}">Υπηρεσίες</a>
                   <a class="{{ request()->is('my_appointments') ? 'active-link nav-link fs-6' : 'nav-link fs-6' }}" href="{{ route('my_appointments') }}">Τα Ραντεβού μου</a>
                   <a class="nav-link fs-6" aria-current="page" href="{{ route('create_appointment') }}">Κλείστε ένα
                       Ραντεβού</a>
                   @endif
                   @if (Auth::check() && Auth::user()->role == 'secretary')
                   <a class="ms-4 {{ request()->is('appointments') ? 'active-link nav-link fs-6' : 'nav-link fs-6' }}" href="{{ route('appointments') }}">Ραντεβού</a>
                   <a class="{{ request()->is('users') ? 'active-link nav-link fs-6' : 'nav-link fs-6' }}" href="{{ route('users') }}">Διαχείριση Χρηστών</a>
                   <a class="{{ request()->is('user_records') ? 'active-link nav-link fs-6' : 'nav-link fs-6' }}" href="{{ route('user_records') }}">Ιστορικό Πελατών</a>
                   @endif
                   @if (Auth::check() && Auth::user()->role == 'doctor')
                   <a class="ms-4 {{ request()->is('appointments') ? 'active-link nav-link fs-6' : 'nav-link fs-6' }}" href="{{ route('appointments') }}">Ραντεβού</a>
                   <a class="{{ request()->is('visit_records') ? 'active-link nav-link fs-6' : 'nav-link fs-6' }}" href="{{ route('visit_records') }}">Ιστορικό Επισκέψεων</a>
                   @endif
                   <div class="ms-auto d-flex">
                       @if (!Auth::check())
                       <div class="d-flex">
                           <li>
                               <a class="nav-link fs-6" aria-current="page" href="{{ route('login') }}">Είσοδος
                               </a>
                           </li>
                           <a class="nav-link fs-6" aria-current="page" href="{{ route('register') }}">Εγγραφή</a>
                       </div>
                       @else
                       <li><a class="nav-link fs-6" href="{{ route('user_profile', Auth::user()->id) }}">Το
                               Προφίλ
                               μου
                           </a></li>
                       <li><a class="nav-link fs-6" href="{{ route('logout') }}">Αποσύνδεση
                           </a></li>
                       @endif
                   </div>
               </div>
           </div>
       </div>
   </nav>
