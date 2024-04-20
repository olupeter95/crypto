@component('mail::message')

    <h3> Hello Admin, </h3>
    <p>A user with the name of <strong>{{ $details['full_name'] }}</strong> just opened a ticket. The ticket information are as follows:</p>
    <p>
        <strong>Full Name:</strong>
        <span>{{ $details['full_name'] }}</span>
    </p>
    <p>
        <strong>Role:</strong>
        <span>{{ $details['role'] }}</span>
    </p>
    <p>
        <strong>Ticket ID:</strong>
        <span>{{ $details['ticket_id'] }}</span>
    </p>
    <p>
        <strong>Subject:</strong>
        <span>{{ $details['subject'] }}</span>
    </p>
    <p>
        <strong>Category:</strong>
        <span>{{ $details['category'] }}</span>
    </p>
    <p>
        <strong>Description:</strong>
        <span><?php echo ($details['description']); ?></span>
    </p>

    Regards,
    {{ config('app.name') }}
@endcomponent
