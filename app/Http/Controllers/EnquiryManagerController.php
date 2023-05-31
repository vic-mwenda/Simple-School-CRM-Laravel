<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use Dompdf\Dompdf;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Config\Repository;
use App\Models\inquiries;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnquiryManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inquiries = inquiries::paginate(5);

        return view('Inquiries.ManageInquiry',compact('inquiries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Inquiries.CreateInquiry');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required','regex:/^([0-9\s\-\+\(\)]*)$/','min:10']
        ]);

        $inquiry = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'interest' => $request->input('course'),
            'source' => $request->input('source'),
            'message' => $request->input('message'),
            'logger' => $request->input('logger'),
        ];

        inquiries::create($inquiry);
        toast('Successfully added inquiry','success');
        return redirect(route('dashboard'))->with('success', 'Inquiry has been submitted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(inquiries $inquiry)
    {
        return view('Inquiries.inquiry', ['inquiries' => $inquiry]);

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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
