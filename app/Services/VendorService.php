<?php

namespace App\Services;

use App\Exceptions\VendorException;
use App\Http\Requests\VendorStoreRequest;
use App\Http\Requests\VendorUpdateRequest;
use App\Models\Vendor;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VendorService
{
    /**
     * @param VendorStoreRequest $request
     * @return void
     * @throws VendorException
     */
    public function create(VendorStoreRequest $request): void
    {
        try {
            DB::beginTransaction();

            Vendor::create($request->validated());

            DB::commit();

            toastr()->success(__('vendor.created'));


        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error on creation of vendor', [$e->getMessage()]);
            throw new VendorException();
        }


    }


    /**
     * @param Vendor $vendor
     * @param VendorUpdateRequest $request
     * @return void
     * @throws VendorException
     */
    public function update(Vendor $vendor, VendorUpdateRequest $request): void
    {
        try {
            DB::beginTransaction();

            $vendor->update($request->validated());

            DB::commit();

            toastr()->success(__('vendor.created'));


        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error on creation of vendor', [$e->getMessage()]);
            throw new VendorException();
        }


    }
}
