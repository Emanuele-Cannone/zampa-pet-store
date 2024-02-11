<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class VendorException extends Exception
{
    public function render(Request $request): RedirectResponse
    {
        toastr()->error(__('vendor.vendor_on_error'));

        return Redirect::route('vendors.index');
    }
}
