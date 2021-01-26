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


</body>

</html>
