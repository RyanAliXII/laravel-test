import toastr from "toastr";
import "toastr/build/toastr.min.css";
const form = document.querySelector("form");
form.addEventListener("submit", async (event) => {
    event.preventDefault();
    const formData = new FormData(event.target);
    const isDoneInput = event.target.querySelector("[name='isDone']");
    console.log();
    const response = await fetch("/todos", {
        method: "POST",
        body: JSON.stringify({
            _token: formData.get("_token"),
            title: formData.get("title"),
            description: formData.get("description"),
            isDone: isDoneInput.checked,
        }),
        headers: new Headers({ "Content-Type": "application/json" }),
    });

    if (response.status === 200) {
        toastr.success(
            `Post has been created successfully. <a href="/todos">View posts</a> `,
            "Post created"
        );
    }
    if (response.status === 400) {
        toastr.error(
            "Please make sure that required fields are not empty",
            "Validation error"
        );
    }
    event.target.reset();
});
