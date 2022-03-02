window.addEventListener("DOMContentLoaded", () => {
    //Selector for the form
    let registerForm = document.querySelector("#register-form");
    //Selector for the response msg
    let msg = document.querySelector(".statusMsg");

    registerForm.addEventListener("submit", (e) => {
        e.preventDefault();

        //Getting the fields from the form
        let data = new FormData(registerForm);

        //Get the URL with the data
        let parseData = new URLSearchParams(data);

        fetch("http://intranetfjr.local/wp-json/intranet/v1/register", {
                method: "POST",
                body: parseData
            })
            .then(res => res.json())
            .then(json => {
                //Personalized message wheter the user is created or not
                msg.innerHTML = `<div class="alert ${json.successful_registration ? "alert-info" : "alert-danger"} text-center">${json?.message}</div>`;
                /*
                If the user registered successfully he gets redirected 
                in 1.5 seconds.
                */
                if (json.successful_registration) {
                    setTimeout(() => {
                        window.location.href = intranet_url.home_url;
                    }, 1500);
                }
            })
            .catch(err => {
                console.log(`There was an error ${err}`);
            })
    })
})