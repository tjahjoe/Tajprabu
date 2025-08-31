<!-- <script src="https://js.pusher.com/beams/1.0/push-notifications-cdn.js"></script>
<script>
    const beamsClient = new PusherPushNotifications.Client({
        instanceId: "{{ config('services.pusher_beams.instance_id') }}",
    });

    beamsClient.start()
        .then(() => beamsClient.addDeviceInterest('hello'))
        .then(() => console.log('Successfully registered and subscribed!'))
        .catch(console.error);

    function enableNotifications() {
        beamsClient.start().then(() => console.log("Registered with beams!"));
    }
</script> -->


<script src="https://cdn.onesignal.com/sdks/web/v16/OneSignalSDK.page.js" defer></script>
<script>
    window.OneSignalDeferred = window.OneSignalDeferred || [];
    OneSignalDeferred.push(async function (OneSignal) {
        await OneSignal.init({
            appId: "1cf92b1f-e920-43b2-b3d5-c3845a748ad3",
        });

        console.log(OneSignal.User.PushSubscription.id);
    });
</script>