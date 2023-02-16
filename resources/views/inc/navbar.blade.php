   <div class="row w-75 m-auto d-block d-md-flex align-items-center p-3 top-nav">
       <div class="col-md-3">
           <a href="{{ route('home') }}"><span class="d-inline-block fs-4">Fluffy</span><span style="color: black;"
                   class="fw-bold fs-3 ms-2">Paw</span>
           </a>
       </div>
       <div class="col-md-3">
           <span>Η τοποθεσία μας</span>
           <p class="fw-bold">Αθήνα Αγίου Δημητρίου 56</p>

       </div>
       <div class="col-md-3">
           <span>Τηλέφωνο</span>
           <p class="fw-bold">210 - 34529718</p>

       </div>
       <div class="col-md-3">
           <span>Τ.Κ.</span>
           <p class="fw-bold">15678</p>
       </div>
   </div>
   <nav style="background-color: #80ceca;" class="navbar navbar-expand-lg p-3">
       <div class="container-fluid w-75">
           <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
               aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
               <div class="navbar-nav w-100">
                   @if (Auth::check() && Auth::user()->role == 'customer')
                       <a class="{{ request()->is('add_pet') ? 'active-link nav-link fs-6' : 'nav-link fs-6' }}"
                           href="{{ route('add_pet') }}">Προσθήκη Κατοικιδίου</a>
                       <a class="{{ request()->is('services') ? 'active-link nav-link fs-6' : 'nav-link fs-6' }}"
                           href="{{ route('services') }}">Υπηρεσίες</a>
                       <a class="{{ request()->is('my_appointments') ? 'active-link nav-link fs-6' : 'nav-link fs-6' }}"
                           href="{{ route('my_appointments') }}">Τα Ραντεβού μου</a>
                       <a class="nav-link fs-6" aria-current="page" href="{{ route('create_appointment') }}">Κλείστε ένα
                           Ραντεβού</a>
                   @endif
                   @if (Auth::check() && Auth::user()->role == 'secretary')
                       <a class="{{ request()->is('appointments') ? 'active-link nav-link fs-6' : 'nav-link fs-6' }}"
                           href="{{ route('appointments') }}">Ραντεβού</a>
                       <a class="{{ request()->is('users') ? 'active-link nav-link fs-6' : 'nav-link fs-6' }}"
                           href="{{ route('users') }}">Χρήστες</a>
                       <a class="{{ request()->is('user_records') ? 'active-link nav-link fs-6' : 'nav-link fs-6' }}"
                           href="{{ route('user_records') }}">Ιστορικό Πελατών</a>
                   @endif
                   @if (Auth::check() && Auth::user()->role == 'doctor')
                       <a class="{{ request()->is('appointments') ? 'active-link nav-link fs-6' : 'nav-link fs-6' }}"
                           href="{{ route('appointments') }}">Ραντεβού</a>
                       <a class="{{ request()->is('visit_records') ? 'active-link nav-link fs-6' : 'nav-link fs-6' }}"
                           href="{{ route('visit_records') }}">Ιστορικό Επισκέψεων</a>
                   @endif
                   <div class="dropdown ms-auto">
                       <button style="background: #80ceca;" class="btn btn-secondary dropdown-toggle border-0"
                           type="button" data-bs-toggle="dropdown" aria-expanded="false">
                           @if (Auth::check())
                               Καλώς Ήρθες {{ Auth::user()->username }}
                           @else
                               Είσοδος
                           @endif
                       </button>
                       <ul class="dropdown-menu">
                           @if (!Auth::check())
                               <li><a class="nav-link fs-6 text-black" aria-current="page"
                                       href="{{ route('login') }}">Είσοδος</a>
                               </li>
                               <a class="nav-link fs-6" aria-current="page" href="{{ route('register') }}">Εγγραφή</a>
                           @else
                               <li><a class="nav-link fs-6 text-black"
                                       href="{{ route('user_profile', Auth::user()->id) }}">Το
                                       Προφίλ
                                       μου
                                   </a></li>
                               <li><a class="nav-link fs-6 text-black" href="{{ route('logout') }}">Αποσύνδεση
                                   </a></li>
                           @endif
                       </ul>
                   </div>
               </div>
           </div>
       </div>
   </nav>
