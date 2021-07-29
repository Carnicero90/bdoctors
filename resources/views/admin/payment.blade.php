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
            <div class="col-md-8 col-md-offset-2">
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
