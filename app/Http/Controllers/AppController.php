<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Animal;
use App\Models\Pet;
use App\Models\Examination;
use App\Models\Appointment;
use App\Models\PetExamination;
use Illuminate\Support\Carbon;

class AppController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function services()
    {
        return view('services');
    }

    public function user_profile($id)
    {
        if (User::where('id', $id)->exists()) {

            $user = User::where('id', $id)->first();
            $query = Pet::with('user')->where('userId', $id);

            $pets = $query->get()->toArray();
            return view('userprofile', ['user' => $user], ['user_pets' => $pets]);
        } else {
            return redirect('/')->with('id_not_found', 'Ο χρήστης δεν υπάρχει.');
        }
    }

    public function edit_pet($id)
    {
        if (Pet::where('id', $id)->exists()) {

            $pet = Pet::find($id);
            $animals = Animal::all();

            return view('edit_pet', ['pet' => $pet], ['animals' => $animals]);
        } else {
            return redirect('/')->with('id_not_found', 'Το κατοικίδιο δεν υπάρχει.');
        }
    }

    public function edit_user($id)
    {
        if (User::where('id', $id)->exists()) {

            $user = User::find($id);

            return view('edit_user', ['user' => $user]);
        } else {
            return redirect('/')->with('id_not_found', 'Ο χρήστης δεν υπάρχει.');
        }
    }


    public function update_pet(Request $request, $id)
    {
        $pet = Pet::find($id);
        $user_id = auth()->user()->id;

        $pet->name =  $request->get('pet_name');
        $pet->weight = $request->get('weight');
        $pet->animal_id = $request->get('animal_type');
        $pet->save();

        return redirect()->to('user_profile/' . $user_id)->with('success', 'Η ενημέρωση ήτανε επιτυχής.');
    }

    public function update_user(Request $request, $id)
    {
        $user = User::find($id);

        $validation = [
            'min' => 'Το ΑΦΜ πρέπει να είναι τουλάχιστον 9 αριθμούς.',
            'max' => 'Το ΑΦΜ πρέπει να είναι μέχρι 9 αριθμούς.',
        ];

        $request->validate([
            'username' => 'required:users',
            'email' => 'required:users',
            'afm' => 'required|min:9|max:9:users'
        ], $validation);

        $user->username =  $request->get('username');
        $user->fullname = $request->get('fullname');
        $user->afm = $request->get('afm');
        $user->email = $request->get('email');
        $user->telephone = $request->get('phone');
        $user->save();

        return redirect()->to('user_profile/' . $id)->with('success', 'Η ενημέρωση ήτανε επιτυχής.');
    }

    public function delete_pet($id)
    {
        if (Pet::where('id', $id)->exists()) {

            Pet::where('id', $id)->delete();

            return redirect()->back()->with('success', 'Το κατοικίδιο διαγραφτήκε επιτυχώς');
        } else {
            return redirect('/')->with('id_not_found', 'Το κατοικίδιο δεν υπάρχει.');
        }
    }

    public function add_pet()
    {
        $animals = Animal::all();
        return view('add_pet', ['animals' => $animals]);
    }

    public function submit_add_pet(Request $request)
    {
        $pet_name = $request->input('pet_name');
        $pet_weight = $request->input('weight');
        $animal_type = $request->input('animal_type');
        $user_id = $request->input('user_id');

        $pet = Pet::create([
            'name' => $pet_name,
            'weight' => $pet_weight,
            'animal_id' => $animal_type,
            'userId' => $user_id,

        ]);
        if (!empty($pet)) {
            $request->session()->flash('success_msg', 'Το κατοικίδιο σας προστέθηκε.');
            return redirect()->route('add_pet');
        }
        return redirect()->route('add_pet');
    }

    public function create_appointment(Request $request)
    {
        $id = auth()->user()->id;

        if ($request->method() == 'POST') {

            $pet = Pet::where('userId', $id)->first();
            if ($pet == null) {
                return redirect()->back()->with('error_msg', 'Προσθέστε ένα κατοικίδιο πρίν κλείσετε ραντεβού');
            }

            $schedule_date = $request->input('schedule_date');
            $time = $request->input('time');

            $currentDate = Carbon::now()->format('Y-m-d');

            if ($currentDate > $schedule_date) {
                return redirect()->back()->with('error_msg', 'Η ημερομηνία δεν είναι έγκυρη.');
            }

            $appointments = Appointment::where('user_id', $id)->get()->toArray();

            // dd($appointments);

            $appointment = Appointment::create([
                'user_id' => $id,
                'pet_id' => $request->input('petId'),
                'schedule_date' => $schedule_date,
                'time' => $time,
            ]);
            if (!empty($appointment)) {
                return redirect()->back()->with('success', 'Το ραντεβού προσθέτηκε επιτυχώς');
            } else {
                return redirect()->route('create_appointment');
            }
        }
        $pets = Pet::with('user')->where('userId', $id)->get()->toArray();
        return view('create_appointment', ['pets' => $pets]);
    }

    // Secretary books appointment
    public function sec_create_appointment($user_id)
    {
        $pets = Pet::with('user')->where('userId', $user_id)->get()->toArray();
        return view('sec_create_appointment', [
            'pets' => $pets,
            'user_id' => $user_id
        ]);
    }
    // Secretary post books appointment
    public function submit_sec_create_appointment(Request $request)
    {
        if ($request->method() == 'POST') {
            $user_id = $request->input('user_id');
            $pet = Pet::where('userId', $user_id)->first();

            if ($pet == null) {
                return redirect()->back()->with('error_msg', 'Ο χρήστης δέν έχει προσθέσει κατοικίδιο.');
            }
            $schedule_date = $request->input('schedule_date');
            $time = $request->input('time');

            $appointment = Appointment::create([
                'user_id' => $user_id,
                'pet_id' => $pet['id'],
                'schedule_date' => $schedule_date,
                'time' => $time,
            ]);
            if (!empty($appointment)) {
                return redirect()->back()->with('success', 'Το ραντεβού προσθέτηκε επιτυχώς');
            } else {
                return redirect()->route('sec_create_appointment');
            }
        }
    }
    // Get all appointments with users pets and examinations
    public function appointments()
    {
        $appointments = Appointment::with('user')
            ->with('pet')
            ->with('petexamination.examination')
            ->get()
            ->toArray();
        return view('appointments', ['appointments' => $appointments]);
    }
    // user appointments
    public function my_appointments()
    {

        $user_id = auth()->user()->id;
        $appointments = Appointment::with("pet")->where('user_id', $user_id)->get();
        return view('my_appointments', ['appointments' => $appointments]);
    }

    public function request_appointment($id)
    {
        $appointment = Appointment::find($id);
        $user_id = auth()->user()->id;

        $appointment->user_id = $user_id;
        $appointment->save();

        return redirect()->back()->with('success', 'Το αιτημά σας βρίσκεται σε εξέλιξη');
    }

    public function confirm_appointment($id)
    {
        $appointment = Appointment::find($id);
        $appointment->status = 'confirmed';
        $appointment->save();

        return redirect()->back()->with('success', 'Η κράτηση έγινε με επιτυχία');
    }

    public function cancel_appointment($id)
    {
        $appointment = Appointment::find($id);
        $appointment->status = 'cancelled';
        $appointment->save();

        return redirect()->to('my_appointments')->with('success', 'Το ραντεβού ακυρώθηκε.');
    }

    public function edit_appointment($id)
    {
        if (Appointment::where('id', $id)->exists()) {

            $appointment = Appointment::find($id);

            return view('edit_appointment', ['appointment' => $appointment]);
        } else {
            return redirect('/')->with('id_not_found', 'Το ραντεβού δεν υπάρχει.');
        }
    }

    public function update_appointment(Request $request, $id)
    {
        $appointment = Appointment::find($id);

        $appointment->schedule_date =  $request->get('schedule_date');
        $appointment->time = $request->get('time');
        $appointment->save();

        return redirect()->to('home/')->with('success', 'Η ενημέρωση ήτανε επιτυχής.');
    }

    // secretary role with all users | search by afm or telephone
    public function users(Request $request)
    {
        $loggedInUserId = auth()->user()->id;
        $users =
            User::where('id', '!=', $loggedInUserId)
            ->where('role', '!=', 'doctor')
            ->get();
        $search = $request->input('query');
        if ($request->method() == 'POST') {
            if ($search) {
                $users_query = User::where('afm', 'like', '%' . $search . '%')
                    ->where('id', '!=', $loggedInUserId)
                    ->where('role', '!=', 'doctor')
                    ->orWhere('telephone', 'like', '%' . $search . '%')
                    ->get();
                return view('users')->with('users', $users_query)->with('search', $search);
            }
        }
        return view('users', [
            'users' => $users,
            'search' => $search ?? ''
        ]);
    }

    public function delete_user($id)
    {
        if (User::where('id', $id)->exists()) {

            User::where('id', $id)->delete();

            return redirect()->back()->with('success', 'Ο χρήστης διαγραφτήκε επιτυχώς');
        } else {
            return redirect('/')->with('id_not_found', 'Ο χρήστης δεν υπάρχει.');
        }
    }

    public function add_examination($pet_id, $appointment_id)
    {
        $examinations = Examination::all();
        return view('add_examination', [
            'examinations' => $examinations,
            'pet_id' => $pet_id,
            'appointment_id' => $appointment_id
        ]);
    }

    public function submit_examination(Request $request)
    {
        if ($request->method() == 'POST') {

            $examinationId = $request->input('examinationId');
            $petId = $request->input('petId');
            $appointment_id = $request->input('appointment_id');
            $comments = $request->input('comments');

            $examination = Examination::find($examinationId);
            $total = $examination['price'];

            $petExamination = PetExamination::create([
                'examinationId' => $examinationId,
                'comments' => $comments,
                'petId' => $petId,
                'appointment_id' => $appointment_id,
                'total' => $total
            ]);

            if (!empty($petExamination)) {
                $request->session()->flash('success_msg', 'Η προσθήκη της εξέτασης έγινε με επιτυχία.');
                return redirect()->route('appointments');
            }
        }
    }

    public function remove_examination($id)
    {
        if (PetExamination::where('id', $id)->exists()) {

            PetExamination::where('id', $id)->delete();

            return redirect()->back()->with('success', 'Η εξέταση διαγραφτήκε');
        } else {
            return redirect('/')->with('id_not_found', 'Η εξέταση δεν υπάρχει.');
        }
    }
    // secretary role with all user records
    public function user_records()
    {

        $records = User::with('pets')
            ->with('petexamination.examination')
            ->get()->toArray();

        return view('user_records', ['records' => $records]);
    }
    // show a single record on modal
    public function show_exam_record($id)
    {
        $pet_examinations = PetExamination::with('examination')->where('petId', $id)->get()->toArray();

        return response()->json($pet_examinations);
    }
    // doctor role with all user visit records
    public function visit_records()
    {
        $currentDate = Carbon::now()->format('Y-m-d');
        $appointments = Appointment::with('user')
            ->with('pet')
            ->with('petexamination.examination')
            ->where('schedule_date', '<', $currentDate)
            ->get()
            ->toArray();

        return view('visit_records', ['appointments' => $appointments]);
    }
}
