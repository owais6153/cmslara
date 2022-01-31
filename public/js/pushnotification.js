    var firebaseConfig = {
        apiKey: document.querySelector('meta[name="firebaseapikey"]').getAttribute('content'),
        authDomain: document.querySelector('meta[name="firebaseauthDomain"]').getAttribute('content'),
        projectId: document.querySelector('meta[name="firebaseprojectId"]').getAttribute('content'),
        storageBucket: document.querySelector('meta[name="firebasestorageBucket"]').getAttribute('content'),
        messagingSenderId: document.querySelector('meta[name="firebasemessagingSenderId"]').getAttribute('content'),
        appId: document.querySelector('meta[name="firebaseappId"]').getAttribute('content'),
        measurementId: document.querySelector('meta[name="firebasemeasurementId"]').getAttribute('content')
    };

    firebase.initializeApp(firebaseConfig);
    firebase.analytics();
    const messaging = firebase.messaging();
    // Get registration token. Initially this makes a network call, once retrieved
    // subsequent calls to getToken will return from cache.
    messaging.getToken({ vapidKey: document.querySelector('meta[name="firebasevapidKey"]').getAttribute('content') }).then((currentToken) => {
        if (currentToken) {
            // Send the token to your server and update the UI if necessary
            // ...
            // document.getElementById('app_id').value = currentToken;
            console.log( currentToken );

            /*messaging.deleteToken(currentToken)
                .then(resp => {
                    console.log(resp);
                })
                .catch(err => {
                    console.error(this.tokenFB, err);
                });*/
        } else {
            // Show permission request UI
            console.log('No registration token available. Request permission to generate one.');
            // ...
        }
    }).catch((err) => {
        console.log('An error occurred while retrieving token. ', err);
        // ...
    });
    /*
    var userToken = '';
    // Import the functions you need from the SDKs you need
    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.1/firebase-app.js";
    import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.6.1/firebase-analytics.js";
    import { getMessaging, getToken } from "https://www.gstatic.com/firebasejs/9.6.1/firebase-messaging.js";


    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries

    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
        apiKey: "AIzaSyChBiRb-muGHgmq1-tT4UffmjcjvRk6IUs",
        authDomain: "erba-quest.firebaseapp.com",
        projectId: "erba-quest",
        storageBucket: "erba-quest.appspot.com",
        messagingSenderId: "364135749212",
        appId: "1:364135749212:web:a2885f5a12e0a497b33899",
        measurementId: "G-Y2C4SP9G3W"
    };

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const analytics = getAnalytics(app);
    const messaging = getMessaging(app);

    getToken(messaging, { vapidKey: 'BDzBOuNcaScRhWa2dBfCS_7mQoNaKRs1nx2NpyUu7TE9RXo1unhMygz3IrPI4FpAgEnnFAUxPoFtgv9XRxHuoxo' }).then((currentToken) => {
        if (currentToken) {
            console.log(currentToken);
            // Send the token to your server and update the UI if necessary
            // ...
        } else {
            // Show permission request UI
            console.log('No registration token available. Request permission to generate one.');
            // ...
        }
    }).catch((err) => {
        console.log('An error occurred while retrieving token. ', err);
        // ...
    });

    //console.log(messaging);//.getToken({vapidKey: "BKagOny0KF_2pCJQ3m....moL0ewzQ8rZu"});

    //console.log(app);
    */