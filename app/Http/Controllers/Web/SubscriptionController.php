<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Subscription\StoreSubscriptionRequest;
use App\Models\Subscription;
use Illuminate\Http\RedirectResponse;

class SubscriptionController extends Controller
{



    public function store(StoreSubscriptionRequest $request): RedirectResponse
    {
        Subscription::query()->create($request->validated());
        return back();
    }


    public function destroy(Subscription $subscription): RedirectResponse
    {
        $subscription->delete();
        return back();
    }
}
