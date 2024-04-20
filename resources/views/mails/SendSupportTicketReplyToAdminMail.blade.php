@component('mail::message')


    <h3> Hello Admin, </h3>
    <p>The raised ticket on user of ID <?php echo $details['ticket_id']; ?> has been responded to by <?php echo $details['full_name'] ?></p>
    <p>Please find the response below:</p>
    <p>
        <strong><?php echo $details['description']; ?></strong>
    </p>

    Regards,
    {{ config('app.name') }}  
@endcomponent