<?php

namespace App\Services;

use App\Http\Requests\VendorStoreRequest;
use App\Models\Vendor;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VendorService
{
    /**
     * @param VendorStoreRequest $request
     * @return void
     */
    public function create(VendorStoreRequest $request): void
    {
        try {
            DB::beginTransaction();

            Vendor::create($request->validated());

            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error on creation of vendor', [$e->getMessage()]);
//            throw new ProductCreationException();
        }


    }
}
