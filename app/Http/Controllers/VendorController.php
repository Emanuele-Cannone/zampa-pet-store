<?php

namespace App\Http\Controllers;

use App\DataTables\VendorsDataTable;
use App\Exceptions\VendorException;
use App\Http\Requests\VendorStoreRequest;
use App\Http\Requests\VendorUpdateRequest;
use App\Models\Vendor;
use App\Services\VendorService;
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
     * @param VendorsDataTable $dataTable
     * @return mixed
     */
    public function index(VendorsDataTable $dataTable): mixed
    {
        return $dataTable->render('vendor.index');
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
        return redirect()->route('vendor.index');
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
     * @return RedirectResponse
     */
    public function destroy(Vendor $vendor): RedirectResponse
    {
        $vendor->delete();
        toastr()->success(__('vendor.deleted'));
        return redirect()->route('vendors.index');

    }
}
