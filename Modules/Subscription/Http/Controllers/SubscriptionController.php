<?php

namespace Modules\Subscription\Http\Controllers;

use App\Mail\SubscriptionMail;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Modules\Setting\Entities\CompanyProfile;
use Modules\Subscription\Entities\Subscription;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        abort_if(Gate::denies('show_subscriptions'), 403);
        $subscriptions = Subscription::latest()->get();

        return view('subscription::subscription.index',compact("subscriptions"));
    }

    public function mail()
    {
        abort_if(Gate::denies('send_mail'), 403);
        $subscriptions = Subscription::latest()->get();

        return view('subscription::subscription.send',compact("subscriptions"));
    }

    public function sendMail(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'message' => 'required'
        ]);
        
        $email = $request;
        $subs = Subscription::all();
        $profile = CompanyProfile::first();
        foreach($subs as $sub){
            Mail::to($sub->email)->send(new SubscriptionMail($email,$profile));
        }

        return back()->with('success','Email Sent Successfully.');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('subscription::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        // return view('subscription::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('subscription::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('delete_subscriptions'), 403);
        $sub = Subscription::findOrfail($id);
        $sub->delete();
        
        return redirect()->route('subscriptions.index')->with('success','Removed Successfully');
    }
}
