<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\inquiries;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

class CustomerManagerController extends Controller
{
    public function index()
    {
        $current_user = Auth::user();

        if ($current_user->role == '0' || $current_user->role == '3') {
            $customers = customer::paginate(5);
        } elseif ($current_user->role == '1') {

            $customers = customer::whereHas('user', function ($query) use ($current_user) {
                $query->where('campus', $current_user->campus);
            })->paginate(5);
        } else {
            $customers = customer::where('user_id', $current_user->id)->paginate(5);
        }

        $customerCount = customer::where('user_id',$current_user->id)->count();

        return view('customers.index', compact('customers','customerCount'));
    }

    public function refresh()
    {
        $externalStudents = Students::all();

        foreach ($externalStudents as $externalStudent) {

            $customer = customer::where('email', $externalStudent->email )->first();

            if ($customer) {

                $customer->status = 'active';
                $customer->save();
            }
        }
        return $this->index();
    }

    function view(customer $customer){
        $inquiries = $customer->inquiries;
        $user = $customer->user;
        return view('customers.view', ['customers' => $customer],compact('inquiries','user'));
    }

    public function filter(Request $request)
    {
        $current_user = Auth::user();

        if ($current_user->role == '0' || $current_user->role == '3') {
            $customers = customer::paginate(5);
        } elseif ($current_user->role == '1') {
            $campus = $current_user->campus;
            $customers = customer::whereHas('user', function ($query) use ($campus) {
                $query->where('campus', $campus);
            })->paginate(5);
        } else {
            $currentUserId = Auth::id();
            $customers = customer::where('user_id', $currentUserId)->paginate(5);
        }

        $days = $request->input('days');

        $filteredCustomers = $customers->filter(function ($customer) use ($days) {
            return $customer->created_at->gte(now()->subDays($days));
        });

        // Return the filtered customers
        return response()->json(['customers' => $filteredCustomers]);
    }


    /**
     * Handle bulk actions
     */
    public function action(Request $request)
    {
        $action = $request->input('bulkAction');
        $selectedItems = $request->input('selectedItems');

        if ($action === 'delete') {
            customer::whereIn('id', $selectedItems)->delete();
        }

        return $this->getUserCustomers();
    }

    public function export($customer_data){
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '4000M');
        try {
            $spreadSheet = new Spreadsheet();
            $spreadSheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(20);
            $spreadSheet->getActiveSheet()->fromArray($customer_data);
            $Excel_writer = new Xls($spreadSheet);
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Customer_Data.xls"');
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
        if ($current_user->role == '0' || $current_user->role == '3') {
            $customers = customer::all();
        } elseif ($current_user->role == '1') {
            $customers = customer::whereHas('user', function ($query) use ($current_user) {
                $query->where('campus', $current_user->campus);
            })->get();
        } else {
            $customers = customer::where('user_id', $currentUserId)->get();
        }

        $data_array [] = array("CustomerName","Email","Phone Number","Age Group","Country","Education Level","How did they hear about us","Gender","Status","Date of Inquiry");
        foreach($customers as $customer)
        {
            $data_array[] = array(
                'CustomerName' =>$customer->name,
                'Email' => $customer->email,
                'Phone Number' => $customer->phone,
                'Age Group'=> $customer->date_of_birth,
                'Country'=>$customer->country,
                'Education Level' => $customer->education_level,
                'How did they hear about us' => $customer->how_did_you_hear,
                'Gender' => $customer->gender,
                'Status' => $customer->status,
                'Date of Inquiry'=>$customer->created_at
            );
        }
        $this->export($data_array);
    }
}
