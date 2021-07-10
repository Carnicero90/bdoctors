@extends('layouts/app')
@section('content')
    <section class="messages">
        @if (isset(Auth::user()->messages))
        <ul>
            @foreach (Auth::user()->messages as $message)

                {{-- li.message --}}
                <li class="message">
                    <p>autore: {{ $message->author_name }}</p>
                    <p>mail: {{ $message->author_email }}</p>
                    <p>data: {{ $message->message_date }}</p>
                    <p>contenuto: {{ $message->text }}</p>
                </li>
                {{-- END li.message --}}

            @endforeach
        </ul>
        @else
            nomessaggi
        @endif
        
    </section>
@endsection
