<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Mail\WelcomeMail;
use Exception;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;
use function request;

/***************************************************************
 * Notes:
 *  what the user send back Request $request or request()
 * input = get data from a form
 * get all customer data.
 * Customer::all()
 * $customers = Customer::where('active', $request->query('active', 1))->get(); where clauses
 * to do the ORM like on symfony query builder
 * $customer = Customer::where('id', 1)->get(); //collection - fancy array
 * only expecting 1 record you can use first to return a model.
 *
 * to add an email php artisan make:mail
 ************************************************************/

/**
 * Class CustomerController
 *
 * @package App\Http\Controllers
 */
class CustomerController extends Controller
{
    /**
     * @param Request $request
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        return view('customer.index');//, compact('customers'));
    }

    /**
     * @param Request $request
     *
     * @return mixed
     *
     * @throws Exception
     */
    public function anyData(Request $request)
    {
        $customers = Customer::where('active', $request->query('active', 1))->get();

        return DataTables::of($customers)->make(true);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $customer = new Customer();

        return view('customer.create', compact('customer'));
    }

    /**
     * @return Application|RedirectResponse|Redirector
     */
    public function store()
    {
        $data = $this->validation();

        $customer = Customer::create($data);
        //send email
        Mail::to($customer->email)->send(new WelcomeMail($customer));

        return redirect('/customers/' . $customer->id);
    }

    /**
     * @param Customer $customer
     *
     * @return Application|Factory|View
     */
    //details page model binding
    public function show(Customer $customer)
    {
        /** @var Customer $customer */
        //to find customer data.
        //$customer = Customer::findOrFail($customerId);

        return view('customer.show', compact('customer'));
    }

    /**
     * @param Customer $customer
     *
     * @return Application|Factory|View
     */
    public function edit(Customer $customer)
    {
        return view('customer.edit', compact('customer'));
    }

    /**
     * @param Customer $customer
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Customer $customer)
    {
        $data = $this->validation();

        $customer->update($data);

        return redirect('/customers');
    }

    /**
     * @param Customer $customer
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(Customer $customer)
    {
        try {
            $customer->delete();
        } catch (Exception $e) {
        }

        return redirect('/customers');
    }

    /**
     * @return array
     */
    private function validation(): array
    {
        return request()->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);
    }
}
