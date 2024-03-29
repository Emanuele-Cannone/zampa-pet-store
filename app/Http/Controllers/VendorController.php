<?php

namespace App\Http\Controllers;

use App\DataTables\VendorsDataTable;
use App\Exceptions\VendorException;
use App\Http\Requests\VendorStoreRequest;
use App\Http\Requests\VendorUpdateRequest;
use App\Models\Vendor;
use App\Services\VendorService;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VendorController extends Controller
{
    /**
     * @param VendorService $service
     */
    public function __construct(readonly private VendorService $service)
    {
    }

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        return view('vendor.index', ['vendors' => Vendor::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        return view('vendor.create');
    }


    /**
     * @param VendorStoreRequest $request
     * @return RedirectResponse
     * @throws VendorException
     */
    public function store(VendorStoreRequest $request): RedirectResponse
    {
        $this->service->create($request);
        return redirect()->route('vendors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param Vendor $vendor
     * @return View
     */
    public function edit(Vendor $vendor): View
    {
        return view('vendor.edit', ['vendor' => $vendor]);
    }

    /**
     * Update the specified resource in storage.
     * @param Vendor $vendor
     * @param VendorUpdateRequest $request
     * @return RedirectResponse
     * @throws VendorException
     */
    public function update(Vendor $vendor, VendorUpdateRequest $request): RedirectResponse
    {
        $this->service->update($vendor, $request);
        return redirect()->route('vendors.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param Vendor $vendor
     * @return JsonResponse
     */
    public function destroy(Vendor $vendor): JsonResponse
    {
        $vendor->delete();
        return response()->json('ok',200);

    }
}
