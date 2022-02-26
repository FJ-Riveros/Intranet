window.addEventListener("DOMContentLoaded", () => {

    //Selector for the login form
    let loginForm = document.querySelector("#login-form");

    //Selector for the response msg
    let msg = document.querySelector(".statusMsg");

    loginForm.onsubmit = (e) => {
        e.preventDefault();

        //Get the fields from the form
        let data = new FormData(loginForm);

        //Get the URL with the data 
        let parseData = new URLSearchParams(data);

        fetch("http://intranetfjr.local/wp-json/intranet/v1/login", {
                method: "POST",
                body: parseData
            })
            .then(res => res.json())
            .then(json => {
                //Redirect the user if the login is successful
                if (!json) window.location.href = intranet_url.home_url;
                else msg.innerHTML = json;
            })
            .catch(err => console.log(`There was an error: ${err}`))
    }
})