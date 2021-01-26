<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <style>
        /* #successMsg, */
        #emailErrorMsg,
        #subjectErrorMsg,
        #requestErrorMsg {
            font-size: 14px;
            opacity: 0;
            -webkit-transition: opacity .3s ease-in-out, height 10s ease-in-out;
            -moz-transition: opacity .3s ease-in-out, height 10s ease-in-out;
            -ms-transition: opacity .3s ease-in-out, height 10s ease-in-out;
            -o-transition: opacity .3s ease-in-out, height 10s ease-in-out;
            transition: opacity .3s ease-in-out;
        }

        .underline {
            text-decoration: underline;
        }

        .no-pb {
            padding-bottom: 0 !important;
        }
    </style>

    <title>Contact Form Using PHP</title>
</head>

<body>

<?php

    $successAlert = "";

    $emailError = $subjectError = $requestError = "";

    $email = $subject = $request = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["email"])) {
        $emailError = "Email address is required";
      } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailError = "Invalid email format";
        }
      }

    if (empty($_POST["subject"])) {
        $subjectError = "Subject is required";
      } else {
        $subject = test_input($_POST["subject"]);
      }

    if (empty($_POST["request"])) {
        $requestError = "Message is required";
      } else {
        $request = test_input($_POST["request"]);
      }

      if ($emailError == "" and $subjectError == "" and $requestError == "") {
        unset($_POST["submitButton"]);
        $to = "hello@loosenthedark.tech";
        $headers = "From: ".$_POST["email"];
        if (mail($to, $subject, $request, $headers)) {
          $successAlert = "<div class='alert alert-success'><strong>Thanks for getting in touch! We'll reply to your query as soon as possible.</strong></div>";
        $email = $subject = $request = "";
         }
        }
      }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>    

    <div class="container">
        <div class="row">
            <div class="col-10 offset-1">
                <h1 class="mt-3 pb-3">Get in touch!</h1>
                <div id="successMsg"><?= $successAlert ?></div>
                <form method="POST" action="<?= $_SERVER["PHP_SELF"]; ?>" id='contactForm' novalidate>
                    <div class="form-group" id='first-form-group'>
                        <label for="email">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter your email" autocomplete="off" tabindex="1" value="<?= $email ?>">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        <div class='mt-1' id="emailErrorMsg"></div>
                        <div class="error"><?= $emailError ?></div>
                    </div>
                    <div class="form-group pb-1" id='second-form-group'>
                        <label for="exampleInputSubject">Subject</label>
                        <input type="text" name="subject" class="form-control" placeholder="Enter a brief summary of your query" autocomplete="off" id="exampleInputSubject" tabindex="2" value="<?= $subject ?>">
                        <div class='mt-2' id="subjectErrorMsg"></div>
                        <div class="error"><?= $subjectError ?></div>
                    </div>
                    <div class="form-group" id='third-form-group'>
                        <label for="exampleInputRequest">What would you like to ask us?</label>
                        <textarea tabindex="3" value="<?= $request ?>" name="request" placeholder="Please post your message here, and we'll get back to you as soon as possible..." class="form-control" id="exampleInputRequest" cols="30" rows="4"><?= $request ?></textarea>
                        <div class='mt-2' id="requestErrorMsg"></div>
                        <div class="error"><?= $requestError ?></div>
                    </div>
                    <button type="submit" tabindex="4" class="btn btn-primary" name="submitButton" id='submitBtn'>Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <script>

    document.getElementById('contactForm').addEventListener('submit', myValidationFunction);

    function myValidationFunction(event) {
      event.preventDefault();
      let form = event.target;
      let successAlert = '';
      let emailAlert = '';
      let subjectAlert = '';
      let requestAlert = '';
      let isEmailValid = document.getElementById ('email').value;
      let isSubjectValid = document.getElementById ('exampleInputSubject').value;
      let isRequestValid = document.getElementById ('exampleInputRequest').value;
      if (isEmailValid == '') {
        emailAlert += '<div class="alert alert-danger" id="first-alert-danger" role="alert"><strong>You forgot to enter your email address</strong></div>';
        document.getElementById('emailErrorMsg').innerHTML = emailAlert;
        document.getElementById('emailErrorMsg').style.opacity = 1;
        document.getElementById('first-form-group').style.marginBottom = 0;
        document.getElementById('first-alert-danger').style.marginBottom = '6px';
      } else if (!isEmail(isEmailValid)) {
        emailAlert += '<div class="alert alert-danger" id="first-alert-danger" role="alert"><strong>Please enter a <span class="underline">valid</span> email address, e.g. yourname@gmail.com</strong></div>';
        document.getElementById('emailErrorMsg').innerHTML = emailAlert;
        document.getElementById('emailErrorMsg').style.opacity = 1;
        document.getElementById('first-form-group').style.marginBottom = 0;
        document.getElementById('first-alert-danger').style.marginBottom = '6px';
      };
      if (isSubjectTooShort(isSubjectValid)) {
        subjectAlert += '<div class="alert alert-danger" id="second-alert-danger" role="alert"><strong>Please tell us what your query relates to (minimum 5 characters)</strong></div>';
        document.getElementById('subjectErrorMsg').innerHTML = subjectAlert;
        document.getElementById('subjectErrorMsg').style.opacity = 1;
        document.getElementById('second-form-group').style.marginBottom = 0;
        document.getElementById('second-form-group').classList.remove('pb-1');
        document.getElementById('second-alert-danger').style.marginBottom = '6px';
      } else if (isSubjectValid == '') {
        subjectAlert += '<div class="alert alert-danger" id="second-alert-danger" role="alert"><strong>You forgot to tell us what your query relates to</strong></div>';
        document.getElementById('subjectErrorMsg').innerHTML = subjectAlert;
        document.getElementById('subjectErrorMsg').style.opacity = 1;
        document.getElementById('second-form-group').style.marginBottom = 0;
        document.getElementById('second-form-group').classList.remove('pb-1');
        document.getElementById('second-alert-danger').style.marginBottom = '6px';
      } else if (isSubjectTooLong(isSubjectValid)) {
        subjectAlert += '<div class="alert alert-danger" id="second-alert-danger" role="alert"><strong>Please post a shorter summary (maximum 100 characters)</strong></div>';
        document.getElementById('subjectErrorMsg').innerHTML = subjectAlert;
        document.getElementById('subjectErrorMsg').style.opacity = 1;
        document.getElementById('second-form-group').style.marginBottom = 0;
        document.getElementById('second-form-group').classList.remove('pb-1');
        document.getElementById('second-alert-danger').style.marginBottom = '6px';
        };
      if (isRequestValid == '') {
        requestAlert += '<div class="alert alert-danger" role="alert"><strong>You forgot to post a message</strong></div>';
        document.getElementById('requestErrorMsg').innerHTML = requestAlert;
        document.getElementById('requestErrorMsg').style.opacity = 1;
      } else if (isRequestTooLong(isRequestValid)) {
        requestAlert += '<div class="alert alert-danger" role="alert"><strong>Please post a shorter message (maximum 500 characters)</strong></div>';
        document.getElementById('requestErrorMsg').innerHTML = requestAlert;
        document.getElementById('requestErrorMsg').style.opacity = 1;
        } else if (isRequestTooShort(isRequestValid)) {
          requestAlert += '<div class="alert alert-danger" role="alert"><strong>Please post a longer message (minimum 20 characters)</strong></div>';
        document.getElementById('requestErrorMsg').innerHTML = requestAlert;
        document.getElementById('requestErrorMsg').style.opacity = 1;
        } else if (isEmail(isEmailValid) && isEmailValid != '' && !isSubjectTooShort(isSubjectValid) && isSubjectValid != '' && !isSubjectTooLong(isSubjectValid) && isRequestValid != '' && !isRequestTooLong(isRequestValid) && !isRequestTooShort(isRequestValid)) {
        form.submit();
        // successAlert += '<div class="alert alert-success" role="alert"><strong>Thanks for getting in touch! We\'ll reply to your query as soon as possible.</strong></div>'
        // document.getElementById('successMsg').innerHTML = successAlert;
        // document.getElementById('successMsg').style.opacity = 1;
        document.getElementById ('contactForm').reset();
        document.getElementById ('email').setAttribute('placeholder', '');
        document.getElementById ('exampleInputSubject').setAttribute('placeholder', '');
        document.getElementById ('exampleInputRequest').setAttribute('placeholder', '');
      };
    }

    document.getElementById('email').onfocus = function () {
      let emailErrorDiv = document.getElementById('emailErrorMsg');
      if (emailErrorDiv.innerHTML != '') {
        emailErrorDiv.style.opacity = 0;
        setTimeout(function () {
          emailErrorDiv.innerHTML = '';
        }, 400);
        document.getElementById('first-form-group').style.marginBottom = '1rem';
      }
    };

    document.getElementById('exampleInputSubject').onfocus = function () {
      let subjectErrorDiv = document.getElementById('subjectErrorMsg');
      if (subjectErrorDiv.innerHTML != '') {
        subjectErrorDiv.style.opacity = 0;
        document.getElementById('second-form-group').style.marginBottom = '16px';
        document.getElementById('second-form-group').classList.add('pb-1');
        setTimeout(function () {
          subjectErrorDiv.innerHTML = '';
        }, 400);
      }
    };

    document.getElementById('exampleInputRequest').onfocus = function () {
      let requestErrorDiv = document.getElementById('requestErrorMsg');
      if (requestErrorDiv.innerHTML != '') {
        requestErrorDiv.style.opacity = 0;
        setTimeout(function () {
          requestErrorDiv.innerHTML = '';
        }, 400);
      }
    };

    function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
    }

    function isSubjectTooShort(subject) {
      let querySubject = document.getElementById('exampleInputSubject').value;
      if (0 < querySubject.length && querySubject.length < 5) {
        return true;
      }
    }

    function isSubjectTooLong(subject) {
      let querySubject = document.getElementById('exampleInputSubject').value;
      if (querySubject.length > 100) {
        return true;
      }
    }

    function isRequestTooLong(request) {
      let message = document.getElementById('exampleInputRequest').value;
      if (message.length > 500) {
        return true;
      }
    }

    function isRequestTooShort(request) {
      let message = document.getElementById('exampleInputRequest').value;
      if (0 < message.length && message.length < 20) {
        return true;
      }
    }

    function hideMessage() {
      document.getElementById('successMsg').style.display = 'none';
    };
    setTimeout(hideMessage, 6000);

    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }

    </script>


</body>

</html>