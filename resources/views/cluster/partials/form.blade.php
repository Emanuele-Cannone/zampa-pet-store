<div class="row">
    <div class="col-sm-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ __('common.general_dates') }}</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" style="display: block;">
                <div class="form-group">
                    <label for="name">{{ __('cluster.name') }}</label>
                    <input type="text" id="name"
                           class="form-control @error('name') is-invalid @enderror"
                           name="name" value="{{ isset($cluster->name) ? $cluster->name : old('name') }}">
                </div>
            </div>
        </div>
    </div>

</div>


