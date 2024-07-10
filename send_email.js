$(document).ready(function () {
    $("#contact-form").on("submit", (e) => {
        e.preventDefault();
        const contactForm = e.target
        const formData = Object.fromEntries(new FormData(contactForm))
        const firstName = formData.firstName;
        const email = formData.email;
        const message = formData.message;

        // perform proper validation here
        if (firstName === "" || email === "" || message === "") {
            alert("No, No, No!");
        }
        else {
            $.ajax({
                url: "./send_email.php",
                type: 'POST',
                data: ({ firstName, email, message }),
                success: function () {
                    console.log();
                    alert("Message sent.");
                    $('#contact-form').trigger("reset");        // reset form inputs
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert("Something went wrong.")
                    console.log(jqXHR, textStatus, errorThrown)
                },
            });
        }


    });

});

//         document.location.href = 'index.html';
