<div class="card-body">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="companyName">{{ __('vendor.company_name') }}</label>
            <input type="text" id="companyName"
                   class="form-control @error('company_name') is-invalid @enderror"
                   name="company_name"
                   value="{{ isset($vendor->company_name) ? $vendor->company_name : old('company_name') }}">
        </div>
        <div class="form-group col-md-6">
            <label for="companyAddress">{{ __('common.address') }}</label>
            <input type="text" id="companyAddress"
                   class="form-control @error('address') is-invalid @enderror" name="address"
                   value="{{ isset($vendor->address) ? $vendor->address : old('address') }}">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <label for="companyCity">{{ __('common.city') }}</label>
            <input type="text" id="companyCity"
                   class="form-control @error('city') is-invalid @enderror" name="city"
                   value="{{ isset($vendor->city) ? $vendor->city : old('city') }}">
        </div>
        <div class="form-group col-md-4">
            <label for="companyCap">{{ __('common.postal_code') }}</label>
            <input type="text" id="companyCap"
                   class="form-control @error('postal_code') is-invalid @enderror"
                   name="postal_code"
                   value="{{ isset($vendor->postal_code) ? $vendor->postal_code : old('postal_code') }}">
        </div>
        <div class="form-group col-md-4">
            <label for="companyCountry">{{ __('common.country') }}</label>
            <input type="text" id="companyCountry"
                   class="form-control @error('country') is-invalid @enderror"
                   name="country"
                   value="{{ isset($vendor->country) ? $vendor->country : old('country') }}">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <label for="fiscalCode">{{ __('common.fiscal_code') }}</label>
            <input type="text" id="fiscalCode"
                   class="form-control @error('fiscal_code') is-invalid @enderror"
                   name="fiscal_code"
                   value="{{ isset($vendor->fiscal_code) ? $vendor->fiscal_code : old('fiscal_code') }}">
        </div>
        <div class="form-group col-md-4">
            <label for="pIva">{{ __('common.p_iva') }}</label>
            <input type="text" id="pIva"
                   class="form-control @error('p_iva') is-invalid @enderror" name="p_iva"
                   value="{{ isset($vendor->p_iva) ? $vendor->p_iva : old('p_iva') }}">
        </div>
        <div class="form-group col-md-4">
            <label for="iban">{{ __('common.iban') }}</label>
            <input type="text" id="iban"
                   class="form-control @error('iban') is-invalid @enderror" name="iban"
                   value="{{ isset($vendor->iban) ? $vendor->iban : old('iban') }}">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <label for="email">{{ __('common.email') }}</label>
            <input type="email" id="email"
                   class="form-control @error('email') is-invalid @enderror" name="email"
                   value="{{ isset($vendor->email) ? $vendor->email : old('email') }}">
        </div>
        <div class="form-group col-md-4">
            <label for="pec">{{ __('common.pec') }}</label>
            <input type="email" id="pec"
                   class="form-control @error('pec') is-invalid @enderror" name="pec"
                   value="{{ isset($vendor->pec) ? $vendor->pec : old('pec') }}">
        </div>
        <div class="form-group col-md-4">
            <label for="telephone">{{ __('common.telephone') }}</label>
            <input type="text" id="telephone"
                   class="form-control @error('telephone') is-invalid @enderror" name="telephone"
                   value="{{ isset($vendor->telephone) ? $vendor->telephone : old('telephone') }}">
        </div>
        <div class="form-group col-sm-6">
            <label for="otherContact">{{ __('common.other_contact') }}</label>
            <input type="text" id="otherContact"
                   class="form-control @error('other_contact') is-invalid @enderror"
                   name="other_contact"
                   value="{{ isset($vendor->other_contact) ? $vendor->other_contact : old('other_contact') }}">
        </div>
    </div>
    <div class="d-flex justify-content-end py-2">
        <button type="submit" class="btn btn-success">{{ __('common.create') }}</button>
    </div>
</div>


