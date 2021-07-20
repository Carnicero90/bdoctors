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
        var button = document.querySelector('#submit-button');
        braintree.dropin.create({
            authorization: "{{ \Braintree\ClientToken::generate() }}",
            container: '#dropin-container',
            locale: 'it_IT'
        }, function(createErr, instance) {
            button.addEventListener('click', function() {
                instance.requestPaymentMethod(function(err, payload) {
                    $.get('{{ route('admin.payment.make', ['id' => $plan->id ]) }}', {
                        payload
                    }, function(response) {
                        console.log(response);
                        if (response.success) {
                            alert('Pagamento riuscito')
                            location.href = '/';
                        } else {
                            alert('Pagamento fallito');
                        }
                    }, 'json');
                });
            });
        });
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h5>Carta per transazione fallita<i class="fas fa-times ml-2"></i></h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="text-secondary">4830635544216121</div>
                        <div class="d-flex">
                            <div class="text-secondary mr-5">04/23</div>
                            <div class="text-secondary">963</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h5>Carta per transazione riuscita<i class="fas fa-check ml-2"></i></h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="text-secondary">5555555555554444</div>
                        <div class="d-flex">
                            <div class="text-secondary mr-5">12/21</div>
                            <div class="text-secondary">123</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div id="dropin-container"></div>
                <button id="submit-button" class="btn btn-success">PAGA</button>
            </div>
        </div>
    </div>
@endsection
