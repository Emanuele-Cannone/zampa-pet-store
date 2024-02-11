<?php

namespace App\Services;

use App\Exceptions\ClusterException;
use App\Http\Requests\ClusterStoreRequest;
use App\Http\Requests\ClusterUpdateRequest;
use App\Http\Requests\VendorStoreRequest;
use App\Models\Cluster;
use App\Models\Vendor;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClusterService
{
    /**
     * @param ClusterStoreRequest $request
     * @return void
     * @throws ClusterException
     */
    public function create(ClusterStoreRequest $request): void
    {
        try {
            DB::beginTransaction();

            Cluster::create($request->validated());

            DB::commit();

            toastr()->success(__('cluster.created'));

        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error on creation of cluster', [$e->getMessage()]);
            throw new ClusterException();
        }


    }


    /**
     * @param Cluster $cluster
     * @param ClusterUpdateRequest $request
     * @return void
     * @throws ClusterException
     */
    public function update(Cluster $cluster, ClusterUpdateRequest $request): void
    {
        try {
            DB::beginTransaction();

            $cluster->update($request->validated());

            DB::commit();

            toastr()->success(__('cluster.updated'));


        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error on update of cluster', [$e->getMessage()]);
            throw new ClusterException();
        }


    }
}
