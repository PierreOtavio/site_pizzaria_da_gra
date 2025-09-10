@foreach ($alerts as $alert)
    <div class="alert alert-{{ $alert['type'] }} alert-dismissible fade show mt-2" role="alert" id="alert-{{ $loop->index }}">
        <i class="{{ $alert['icon'] }}"></i>
        @if (is_array($alert['message']))
            <ul class="mb-0">
                @foreach ($alert['message'] as $msg)
                    <li>{{ $msg }}</li>
                @endforeach
            </ul>
        @else
            {{ $alert['message'] }}
        @endif
    </div>
    <script>
        setTimeout(function() {
            var alert = document.getElementById('alert-{{ $loop->index }}');
            if (alert) { alert.classList.remove('show'); }
        }, 4000);
    </script>
@endforeach
