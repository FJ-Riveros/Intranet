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
                msg.innerHTML = json;
            })
            .catch(err => {
                console.log(`There was an error ${err}`);
            })
    })
})