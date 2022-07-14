<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use Illuminate\Http\Request;
use App\Mail\WelcomeNewUserMail;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use App\Providers\NewCustomerHasRegisteredEvent;
// use App\Events\NewCustomerHasRegisteredEvent;

class CustomersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function index()
    {
        // Using Scope In Database Model
        // $activeCustomers = Customer::active()->get();
        // $inactiveCustomers = Customer::inactive()->get();

        // Two different queries
        // $activeCustomers = Customer::where('status' , 1)->get();
        // $inactiveCustomers = Customer::where('status' , 0)->get();

        // Fetching all the Customer
         $customers = Customer::all();

        // Passing data in Array from
        /* return view('internals.customers', [
            'activeCustomers' => $activeCustomers,
            'inactiveCustomers' => $inactiveCustomers,
        ]); /**/

        // passing data in compact (Shorthand Notation)
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        $companies = Company::all();
        $customer = new Customer();

        return view('customers.create', compact('companies', 'customer'));
    }

    /** @noinspection PhpUndefinedMethodInspection */
    public function store()
    {
        // Validation
        /* $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'status' => 'required',
            'company_id' => 'required',
        ]); /**/

        // Saving to Database In One Line
        // Customer::create($data);
        $customer = Customer::create($this->validateRequest());

        // Store Image If Customer Proved
        $this->storeImage($customer);

        event(new NewCustomerHasRegisteredEvent($customer));

        // Saving to Database
        /* $customer = new Customer();
        $customer->name = request('name');
        $customer->email = request('email');
        $customer->status = request('status');
        $customer->save(); /**/

        // return back();
        // return redirect('customers');
    }

    public function show(Customer $customer)
    {
        // $customer = Customer::find($customer);
        // $customer = Customer::where('id', $customer)->firstOrFail();

        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        $companies = Company::all();
        return view('customers.edit', compact('customer', 'companies'));
    }

    public function update(Customer $customer)
    {
        // Validation
        /* $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'status' => 'required',
            'company_id' => 'required',
        ]); /**/

        // Saving to Database In One Line
        // $customer->update($data);
        $customer->update($this->validateRequest());

        $this->storeImage($customer);

        return redirect('customers/'.$customer->id);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect('customers');
    }

    public function validateRequest()
    {
        // Validation
        // Before adding Images
        /* return request()->validate([
                'name' => 'required|min:3',
                'email' => 'required|email',
                'status' => 'required',
                'company_id' => 'required',
            ]);*/

        // tap Method to Redirect and Validate
        /* return tap(request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'status' => 'required',
            'company_id' => 'required',

        ]), function () {

            if (request()->hasFile('image')) {
                request()->validate([
                    'image' => 'file|image',
                ]);
            }

        });*/

        // Laravel Inbuilt Method Sometimes for Image uploading
        return request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'status' => 'required',
            'company_id' => 'required',
            'image' => 'sometimes|file|image|max:5000',
        ]);

    }

    private function storeImage($customer)
    {
        if (request()->has('image')) {
            $customer->update([
                'image' => request()->image->store('uploads', 'public')
            ]);

            // $image = Image::make(public_path(('storage/' . $customer->image)))->fit(300, 300);
            // $image = Image::make(public_path(('storage/' . $customer->image)))->fit(300, 1000); // Filled Every thing with that 1000px
            // $image = Image::make(public_path(('storage/' . $customer->image)))->crop(300, 300);

            $image = Image::make(public_path(('storage/' . $customer->image)))->resize(500,400);
            $image->save();
        }
    }

}
