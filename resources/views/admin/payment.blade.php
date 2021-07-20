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
                    $.get('{{ route('admin.payment.make') }}', {
                        payload
                    }, function(response) {
                        console.log(response);
                        if (response.success) {
                            alert('Abbonamento avvenuto con s!ccesso@')
                            location.href = '/';
                        } else {
                            alert('Hai fallito perche sei un fallito');
                        }
                    }, 'json');
                });
            });
        });
    </script>
@endsection

@section('content')
    <div class="container">
        @dump($plan->name)
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div id="dropin-container"></div>
                <button id="submit-button">PAGA</button>
            </div>
        </div>
    </div>
@endsection
