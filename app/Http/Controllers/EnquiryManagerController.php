<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Barryvdh\DomPDF\PDF;
use Dompdf\Dompdf;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Config\Repository;
use PragmaRX\Countries\Package\Countries;
use App\Models\inquiries;
use App\Models\customer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EnquiryManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $current_user=Auth::user();
        if ($current_user->role == '0'||$current_user->role == '3'){

        $inquiries = inquiries::with('customer', 'user')->get();
        return view('Inquiries.ManageInquiry',['inquiries' => $inquiries]);

        }elseif ($current_user->role == '1'){
            $campus = $current_user->campus;
            $inquiries = inquiries::whereHas('user', function ($query) use ($campus) {
                $query->where('campus', $campus);
            })->with('customer', 'user')->get();
            return view('Inquiries.ManageInquiry',['inquiries' => $inquiries]);
        }else{
            $currentUserId = Auth::id();

            $inquiries = inquiries::whereHas('user', function ($query) use ($currentUserId) {
                $query->where('id', $currentUserId);
            })->with('customer', 'user')->get();
            return view('Inquiries.ManageInquiry',['inquiries' => $inquiries]);
        }
    }
    /**
     * Filter our tables
     */
    public function filter(Request $request)
    {
        $current_user = Auth::user();

        if ($current_user->role == '0' || $current_user->role == '3') {
            $inquiries = inquiries::with('customer', 'user')->get();
        } elseif ($current_user->role == '1') {
            $campus = $current_user->campus;
            $inquiries = inquiries::whereHas('user', function ($query) use ($campus) {
                $query->where('campus', $campus);
            })->with('customer', 'user')->get();
        } else {
            $currentUserId = Auth::id();
            $inquiries = inquiries::whereHas('user', function ($query) use ($currentUserId) {
                $query->where('id', $currentUserId);
            })->with('customer', 'user')->get();
        }

        $days = $request->input('days');

        $filteredInquiries = $inquiries->filter(function ($inquiry) use ($days) {
            return $inquiry->created_at->gte(now()->subDays($days));
        });

        // Return the filtered inquiries
        return response()->json(['inquiries' => $filteredInquiries]);
    }
    /**
     * Handle bulk actions
     */
    public function action(Request $request):RedirectResponse
    {
        $action = $request->input('bulkAction');
        $selectedItems = $request->input('selectedItems');

        if ($action === 'delete') {
            inquiries::whereIn('id', $selectedItems)->delete();
        }

        return redirect()->route('manageinquiry.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $country = new Countries();
        $courses = Course::all();
        $countries = $country->all();
        return view('Inquiries.CreateInquiry',compact('countries','courses'));
    }

    /**
     * dynamic states option feedback for our inquiries form
     */
    public function states(){

        $countryCode = request('country');
        $states = app(Countries::class)->where('cca3', $countryCode)->first()->hydrateStates()->states;

        return response()->json([
            'states' => $states,
        ]);
    }


    /**
     * Store a newly created inquiry in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $userId = Auth::id();
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required|email',
            'phone' => ['required','regex:/^([0-9\s\-\+\(\)]*)$/','min:10'],
            'date_of_birth' => 'nullable|date',
            'gender' => 'required',
            'country' => ['required', 'string'],
            'state' => 'nullable',
            'town' => 'nullable',
            'postal_code' => 'nullable',
            'education_level' => 'nullable',
            'institution_attended' => 'nullable',
            'field_of_study' => 'nullable',
            'how_did_you_hear' => 'required',
            'consent_terms' => 'required|string',
            'message' => 'string',
            'category' => 'required',
            'course_name' => 'nullable',
            'subject' => 'required',
        ]);

        $customer = customer::where('email', $request->input('email'))->first();

        if (!$customer) {
            $customer = customer::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'country' => $request->input('country'),
                'state' => $request->input('state'),
                'city' => $request->input('town'),
                'postal_code' => $request->input('postal_code'),
                'date_of_birth' => $request->input('date_of_birth'),
                'gender' => $request->input('gender'),
                'education_level' => $request->input('education_level'),
                'institution_attended' => $request->input('institution_attended'),
                'field_of_study' => $request->input('field_of_study'),
                'how_did_you_hear' => $request->input('how_did_you_hear'),
                'user_id'=>$userId
            ]);
        }

        $inquiries= [
            'message' => $request->input('message'),
            'customer_id' => $customer->id,
            'user_id' => $userId,
            'category' => $request->input('category'),
            'course_name' => $request->input('course_name'),
            'subject' => $request->input('subject'),
        ];
        inquiries::create($inquiries);


        toast('Customer data and inquiry have been saved successfully.', 'success');

        return redirect()->route('manageinquiry.create');
    }
    /**
     * Display the specified resource.
     */
    public function show(inquiries $inquiry)
    {
        $inquiry = inquiries::with('customer', 'user')->find($inquiry->id);
        return view('Inquiries.inquiry', ['inquiry' => $inquiry]);
    }

    /**
     * Print a list of all resources.
     */
    public function print(){
        $dompdf = new Dompdf();
        $files = new Filesystem();
        $options = app(Repository::class);
        $view = app(Factory::class);
        $pdf= new PDF($dompdf,$options,$files,$view);
        $inquiries = inquiries::all();
        $pdf->loadView('Inquiries.pdf.AllInquiries',compact('inquiries'));
        return $pdf->download('inquiries.pdf');
    }

    /**
     * Download a specified resource.
     */
    public function download(inquiries $inquiry){
        $dompdf = new Dompdf();
        $files = new Filesystem();
        $options = app(Repository::class);
        $view = app(Factory::class);
        $pdf= new PDF($dompdf,$options,$files,$view);
        $data= ['inquiries' => $inquiry];
        $pdf->loadView('Inquiries.pdf.inquirypdf',$data);
        return $pdf->download('inquiry.pdf');
    }


}
