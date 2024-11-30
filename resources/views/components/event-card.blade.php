<!-- resources/views/components/event-card.blade.php -->
<div class="card mb-4 shadow-sm">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Event: {{ $eventRequest->EventNo }}</h5>
            <a href="" class="">
                <i class="bi-pencil-fill text-black"></i>
            </a>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-2">
            <p class="mb-0"><strong>Event Date:</strong>
                {{ \Carbon\Carbon::parse($eventRequest->DateHeld)->format('d/m/Y') }}
            </p>
            <span class="badge bg-{{ $eventRequest->Status == 'Autorizado' ? 'success' : 'danger' }}">
                {{ $eventRequest->Status }}
            </span>
        </div>
    </div>

    <div class="card-body">
        <h5><strong>Customer Details:</strong></h5>
        <div class="d-flex justify-content-between">
            <span><strong>Customer No:</strong> {{ $eventRequest->CustNo }}</span>
            <span><strong>Facility No:</strong> {{ $eventRequest->FacNo }}</span>
        </div>
        <hr class="divide-gray-300">

        <h5><strong>Event Details:</strong></h5>
        <div class="mb-3">
            <div class="d-flex justify-content-between">
                <span><strong>Estimate Cost:</strong> ${{ number_format($eventRequest->EstCost, 2) }}</span>
                <span><strong>Estimate Audience:</strong> {{ number_format($eventRequest->EstAudience) }}
                    personas</span>
            </div>
            <div class="mt-2">
                <strong>Bud No:</strong> {{ $eventRequest->BudNo ?? '(Campo vacío)' }}
            </div>
        </div>
    </div>

    <div class="card-footer d-flex justify-content-between">
        <span class="small"><strong>Date Requested:</strong>
            {{ \Carbon\Carbon::parse($eventRequest->DateReq)->format('d/m/Y') }}</span>
        <span class="small"><strong>Date Auth:</strong>
            {{ \Carbon\Carbon::parse($eventRequest->DateAuth)->format('d/m/Y') }}</span>
    </div>
</div>