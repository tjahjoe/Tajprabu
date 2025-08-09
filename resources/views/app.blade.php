<script src="https://js.pusher.com/beams/1.0/push-notifications-cdn.js"></script>
<script>
    const beamsClient = new PusherPushNotifications.Client({
        instanceId: "{{ env('PUSHER_BEAMS_INSTANCE_ID') }}",
    });

    beamsClient.start()
        .then(() => beamsClient.addDeviceInterest('hello'))
        .then(() => console.log('Successfully registered and subscribed!'))
        .catch(console.error);

    function enableNotifications() {
        beamsClient.start().then(() => console.log("Registered with beams!"));
    }
</script>