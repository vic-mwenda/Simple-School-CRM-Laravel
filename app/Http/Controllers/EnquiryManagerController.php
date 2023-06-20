<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;
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
        }elseif ($current_user->role == '1'){
            $campus = $current_user->campus;
            $inquiries = inquiries::whereHas('user', function ($query) use ($campus) {
                $query->where('campus', $campus);
            })->with('customer', 'user')->get();
        }else{
            $currentUserId = Auth::id();

            $inquiries = inquiries::whereHas('user', function ($query) use ($currentUserId) {
                $query->where('id', $currentUserId);
            })->with('customer', 'user')->get();
        }
        $inquiriesCount = inquiries::where('user_id',$current_user->id)->count();

        return view('Inquiries.ManageInquiry',['inquiries' => $inquiries],compact('inquiriesCount'));

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
            'age_group' => 'nullable|string',
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
                'date_of_birth' => $request->input('age_group'),
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
     * Export a spreadsheet of all inquiries.
     */
   public function export($inquiry_data){
       ini_set('max_execution_time', 0);
       ini_set('memory_limit', '4000M');
       try {
           $spreadSheet = new Spreadsheet();
           $spreadSheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(20);
           $spreadSheet->getActiveSheet()->fromArray($inquiry_data);
           $Excel_writer = new Xls($spreadSheet);
           header('Content-Type: application/vnd.ms-excel');
           header('Content-Disposition: attachment;filename="Customer_ExportedData.xls"');
           header('Cache-Control: max-age=0');
           ob_end_clean();
           $Excel_writer->save('php://output');
           exit();
       } catch (Exception $e) {
           return;
       }

   }

   public function exportData(){
    $current_user= Auth::user();
    $currentUserId = Auth::id();

       if ($current_user->role == '0'||$current_user->role == '3'){
           $inquiries = inquiries::with('customer', 'user')->get();
       }elseif ($current_user->role == '1'){
           $campus = $current_user->campus;
           $inquiries = inquiries::whereHas('user', function ($query) use ($campus) {
               $query->where('campus', $campus);
           })->with('customer', 'user')->get();
       }else{
           $currentUserId = Auth::id();

           $inquiries = inquiries::whereHas('user', function ($query) use ($currentUserId) {
               $query->where('id', $currentUserId);
           })->with('customer', 'user')->get();
       }

       $data_array [] = array("CustomerName","Email","CourseName","Message","Status","Location",'User');
       foreach($inquiries as $inquiry)
       {
           $data_array[] = array(
               'CustomerName' =>$inquiry->customer->name,
               'Email' => $inquiry->customer->email,
               'CourseName' => $inquiry->course_name,
               'Message' => $inquiry->message,
               'Status' => $inquiry->customer->status,
               'Location' =>$inquiry->user->campus,
               'User'=>$inquiry->user->name
           );
       }
       $this->export($data_array);
   }
}
