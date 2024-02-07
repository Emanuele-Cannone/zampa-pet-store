<div class="card-body">
    @csrf
    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" class="form-control" id="name" placeholder="Inserisci nome"
               name="name" value="{{ isset($customer) ? $customer->name: '' }}">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email"
               name="email"  value="{{ isset($customer) ? $customer->email: '' }}"
               placeholder="Inserisci email">
    </div>
    <div class="form-group">
        <label for="phone_number">Telefono</label>
        <input type="number" class="form-control" id="phone_number"
               value="{{ isset($customer) ? $customer->phone_number: '' }}"
               name="phone_number" placeholder="Inserisci telefono">
    </div>
</div>

<div class="card-footer">
    <button type="submit" class="btn btn-primary">
        {{ isset($customer) ? 'Modifica dati' : 'Invia dati'}}
    </button>
</div>
