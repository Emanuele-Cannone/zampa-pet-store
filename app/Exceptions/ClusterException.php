<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ClusterException extends Exception
{

    public function render(Request $request): RedirectResponse
    {
        toastr()->error(__('cluster.cluster_on_error'));

        return Redirect::route('clusters.index');
    }
}
