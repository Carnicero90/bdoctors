{{-- termini e condizioni --}}
<div class="form-group form-check">
    <input type="checkbox" class="form-check-input" name="terms-conditions" id="terms-conditions" required>
    <label class="form-check-label" for="terms-conditions">Accetta Termini e Condizioni</label>
    @error('terms-conditions')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>