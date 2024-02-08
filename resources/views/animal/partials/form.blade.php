<div class="card-body">
    @csrf
    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" class="form-control" id="name" placeholder="Inserisci nome"
               name="name" value="{{ isset($animal) ? $animal->name: '' }}">
    </div>
    <div class="form-group">
        <label for="species">Specie</label>
        <input type="text" class="form-control" id="species"
               name="species" value="{{ isset($animal) ? $animal->species: '' }}"
               placeholder="Inserisci specie: cane, gatto, ecc">
    </div>
    <div class="form-group">
        <label for="breeze">Razza</label>
        <input type="text" class="form-control" id="breed"
               value="{{ isset($animal) ? $animal->breed : '' }}"
               name="breed" placeholder="Inserisci razza">
    </div>
    <div class="form-group">
        <label for="breeze">Anno di nascita</label>
        <input type="number" class="form-control" id="year_birth"
               value="{{ isset($animal) ? $animal->year_birth : '' }}"
               name="year_birth" placeholder="Inserisci anno di nascita">
    </div>
    <div class="form-group">
        <label for="is_sterilized">Animale sterilizzato?</label>
        <select class="form-control" id="is_sterilized"
                name="is_sterilized">
            <option value="">Scegli...</option>
            <option value="0" {{ isset($animal) && !$animal->is_sterilized ? 'selected' : '' }}>No</option>
            <option value="1" {{ isset($animal) && $animal->is_sterilized ? 'selected' : '' }}>Sì</option>
        </select>
    </div>
    <div class="form-group">
        <label for="customer_id">Cliente Associato</label>
        <select class="form-control" id="customer_id"
                name="customer_id">
            <option value="">Scegli...</option>
            @foreach($customers as $customer)
                <option value="{{$customer->id}}" {{ isset($animal) && $animal->customer_id == $customer->id ? 'selected' : '' }}>
                    {{ $customer->name }} - {{ $customer->email }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="card-footer">
    <button type="submit" class="btn btn-primary">
        {{ isset($animal) ? 'Modifica dati' : 'Invia dati'}}
    </button>
</div>
