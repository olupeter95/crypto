@component('mail::message')

    <h3> Hello <?php echo $details['full_name']; ?>, </h3>
    <p>Your raised ticket on CoinShape of ID <strong><?php echo $details['ticket_id']; ?></strong>  has been responded to by the admin.</p>
    <p>Please find the response below:</p>
    <p>
        <strong><?php echo $details['description']; ?></strong>
    </p>

    Regards,
    {{ config('app.name') }}
 @endcomponent
