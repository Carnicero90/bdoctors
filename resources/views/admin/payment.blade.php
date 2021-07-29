@extends('layouts.app')
@section('header-scripts')
    {{-- Axios --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> --}}
    {{-- jQuery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    {{-- Braintree --}}
    <script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>
@endsection

@section('footer-scripts')
    <script>
        const f = document.querySelector('#payment-form');
        const button = document.querySelector('#submit-button');
        const status_input = document.querySelector('#status');
        braintree.dropin.create({
            authorization: "{{ \Braintree\ClientToken::generate() }}",
            container: '#dropin-container',
            locale: 'it_IT'
        }, function(createErr, instance) {
            button.addEventListener('click', function() {
                event.preventDefault();
                instance.requestPaymentMethod(function(err, payload) {
                    if (err) {
                        alert(err);
                    }
                    $.get('{{ route('admin.payment.make', ['id' => $plan->id]) }}', {
                        payload
                    }, function(response) {
                        status_input.value = response.success ? 1 : 0;
                        f.submit()
                    }, 'json');
                });
            });
        });
    </script>
@endsection

@section('content')
<div class="top-margine">
    <div class="container">
        <div class="text-center">
            @include("partials.success-messages")
            @include("partials.error-messages")
        </div>
        <div class="row">
            <div class="col-12 mt-3">
                <h1>Acquista il piano {{$plan->name}}</h1>
                <h2>a soli € {{$plan->pricing}} per {{$plan->duration_in_hours}} ore di sponsorizzazione</h2>
            </div>
            <div>
                <form action="{{ route('sponsor-store', ['id' => $plan->id ]) }}" id="payment-form" method="get">
                    @csrf
                    @method('GET')
                    <input type="hidden" name="success" id="status">
                    <input type="hidden" name="sponsorplan_id">
                    <div id="dropin-container"></div>
                    <button id="submit-button" class="btn btn-outline-success mt-2">Effettua Pagamento</button>
                </form>
            </div>
        </div>


        <!-- Bootstrap inspired Braintree Hosted Fields example -->
        <div class="bootstrap-basic mt-5">
            <form class="needs-validation" novalidate="">
        
                <div class="row">
                    <div class="col-sm-6 mb-3">
                    <label for="cc-name">Nome titolare carta</label>
                    <div class="form-control" id="cc-name"></div>
                    <small class="text-muted">Inserisci nome e cognome visibili sulla carta</small>
                    <div class="invalid-feedback">
                        Name on card is required
                    </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="you@example.com">
                    <div class="invalid-feedback">
                        Inserisci un indirizzo email valido
                    </div>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-sm-6 mb-3">
                    <label for="cc-number">Numero di carta</label>
                    <div class="form-control" id="cc-number"></div>
                    <div class="invalid-feedback">
                        Il numero di carta è richiesto
                    </div>
                    </div>
                    <div class="col-sm-3 mb-3">
                    <label for="cc-expiration">Scadenza</label>
                    <div class="form-control" id="cc-expiration"></div>
                    <div class="invalid-feedback">
                        La data di scadenza è richiesta
                    </div>
                    </div>
                    <div class="col-sm-3 mb-3">
                    <label for="cc-expiration">CVV</label>
                    <div class="form-control" id="cc-cvv"></div>
                    <div class="invalid-feedback">
                        Il codice di sicurezza è richiesto
                    </div>
                    </div>
                </div>
            
                <hr class="mb-4">
                <div class="text-center">
                    <button id="submit-button" class="btn btn-outline-success mt-2">Effettua Pagamento</button>
                </div>
                <div class="text-center mt-3">
                    <button class="btn btn-primary btn-lg" type="submit">Pay with <span id="card-brand">Card</span></button>
                </div>
            </form>

        </div>

        <div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
                <div class="toast-header">
                    <strong class="mr-auto">Success!</strong>
                    <small>Just now</small>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    Next, submit the payment method nonce to your server.
                </div>
            </div>
        </div>
  
  

        {{-- <div class="row mt-4">
            <div class="col-4">
                <h5>Carta per transazione fallita<i class="fas fa-times ml-2"></i></h5>
                <div>4830 6355 4421 6121</div>
                <div>04/23</div>
                <div>963</div>
            </div>
            <div class="col-4">
                <h5>Carta per transazione riuscita<i class="fas fa-check ml-2"></i></h5>
                <div>5555 5555 5555 4444</div>
                <div>12/21</div>
                <div>123</div>
            </div>
        </div> --}}
    </div>
</div>
@endsection
