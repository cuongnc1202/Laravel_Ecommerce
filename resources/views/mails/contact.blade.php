<div class="heading">
    <span>
        <b>From: {{ $first_name }} {{ $last_name }}</b>
        <span><<em>{{ $email }}</em>></span>
    </span>
    <div>
        <em>Phone: {{ $phone }}.</em>
        <em>Address: {{ $address }}</em>
    </div>
</div>
<div class="body">
    <h3>Subject: {{ $subject }}</h3>
    <h3>Message:</h3>
    <p>
        {{ $mail_body }}
    </p>
</div>
