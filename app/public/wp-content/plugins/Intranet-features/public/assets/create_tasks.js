window.addEventListener("DOMContentLoaded", () => {
    //Selector for the login form
    let createTasksForm = document.querySelector("#create-tasks-form");

    //Selector for the response msg
    let msg = document.querySelector(".statusMsg");


    createTasksForm.onsubmit = (e) => {
        e.preventDefault();

        //Get the fields from the form
        let data = new FormData(createTasksForm);

        //Get the URL with the data 
        let parseData = new URLSearchParams(data);

        fetch("http://intranetfjr.local/wp-json/intranet/v1/create_tasks", {
                method: "POST",
                body: parseData
            })
            .then(res => res.json())
            .then(json => {
                //Redirect the user if the creation of the tasks is successful
                // if (!json) window.location.href = intranet_url.home_url;
                // else msg.innerHTML = json;
            })
            .catch(err => console.log(`There was an error: ${err}`))
    }
})