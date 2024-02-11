<?php

namespace App\Http\Controllers;

use App\DataTables\ClustersDataTable;
use App\Exceptions\ClusterException;
use App\Http\Requests\ClusterStoreRequest;
use App\Http\Requests\ClusterUpdateRequest;
use App\Models\Cluster;
use App\Services\ClusterService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ClusterController extends Controller
{

    public function __construct(private readonly ClusterService $service)
    {
    }

    /**
     * Display a listing of the resource.
     * @param ClustersDataTable $dataTable
     * @return mixed
     */
    public function index(ClustersDataTable $dataTable): mixed
    {
        return $dataTable->render('cluster.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        return view('cluster.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param ClusterStoreRequest $request
     * @return RedirectResponse
     * @throws ClusterException
     */
    public function store(ClusterStoreRequest $request): RedirectResponse
    {
        $this->service->create($request);
        return redirect()->route('clusters.index');
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
     * @param Cluster $cluster
     * @return View
     */
    public function edit(Cluster $cluster): View
    {
        return view('cluster.edit', ['cluster' => $cluster]);
    }

    /**
     * Update the specified resource in storage.
     * @param Cluster $cluster
     * @param ClusterUpdateRequest $request
     * @return RedirectResponse
     * @throws ClusterException
     */
    public function update(Cluster $cluster, ClusterUpdateRequest $request): RedirectResponse
    {
        $this->service->update($cluster, $request);
        return redirect()->route('clusters.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param Cluster $cluster
     * @return RedirectResponse
     */
    public function destroy(Cluster $cluster): RedirectResponse
    {
        $cluster->delete();
        toastr()->success(__('cluster.deleted'));
        return redirect()->route('clusters.index');
    }
}
