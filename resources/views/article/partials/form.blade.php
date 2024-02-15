<div class="card-body">
    @csrf
    <div class="form-group">
        <label for="ean_code">Eancode</label>
        <input type="text" class="form-control" id="ean_code" placeholder="Inserisci eancode"
               name="ean_code" value="{{ isset($article) ? $article->ean_code : '' }}">
    </div>
    <div class="form-group">
        <label for="product_code">Codice prodotto</label>
        <input type="text" class="form-control" id="product_code"
               name="product_code" value="{{ isset($article) ? $article->product_code: '' }}"
               placeholder="Inserisci codice prodotto">
    </div>
    <div class="form-group">
        <label for="description">Descrizione</label>
        <input type="text" class="form-control" id="description"
               value="{{ isset($article) ? $article->description : '' }}"
               name="description" placeholder="Inserisci descrizione">
    </div>

    <div class="form-group">
        <label for="is_active">Prodotto attivo?</label>
        <select class="form-control" id="is_active"
                name="is_active">
            <option value="">Scegli...</option>
            <option value="0" {{ isset($article) && !$article->is_active ? 'selected' : '' }}>No</option>
            <option value="1" {{ isset($article) && $article->is_active ? 'selected' : '' }}>Sì</option>
        </select>
    </div>

    <div class="form-group">
        <label for="is_active">Prodotto in ordine?</label>
        <select class="form-control" id="in_order"
                name="in_order">
            <option value="">Scegli...</option>
            <option value="0" {{ isset($article) && !$article->in_order ? 'selected' : '' }}>No</option>
            <option value="1" {{ isset($article) && $article->in_order ? 'selected' : '' }}>Sì</option>
        </select>
    </div>

</div>

<div class="card-footer">
    <button type="submit" class="btn btn-primary">
        {{ isset($animal) ? 'Modifica dati' : 'Invia dati'}}
    </button>
</div>
