import Swal from "sweetalert2";
import toastr from "toastr";
import "toastr/build/toastr.min.css";
const csrf = document.querySelector("input[name='_token'");
const deleteTodoButtons = document.querySelectorAll(".delete-btn");
const checkboxes = document.querySelectorAll(".status-checkbox");

deleteTodoButtons.forEach((btn) => {
    btn.addEventListener("click", async (event) => {
        const id = event.target.value;
        const result = await Swal.fire({
            icon: "warning",
            title: "Delete Todo!",
            text: "Are you sure you want to delete this todo?",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it",
            customClass: {
                confirmButton: "btn btn-danger",
                cancelButton: "btn btn-primary",
            },
        });
        if (!result.isConfirmed) return;

        const response = await fetch(`/todos/${id}`, {
            method: "DELETE",
            headers: new Headers({
                "X-CSRF-TOKEN": csrf.value,
            }),
        });
        if (response.status === 200) {
            document.querySelector(`#todo-${id}`)?.remove();
            toastr.success("Post deleted successfully.", "Post deletion");
        }
        if (response.status >= 400) {
            toastr.error("Error", "Unknown error occured");
        }
    });
});

checkboxes.forEach((checkbox) => {
    checkbox.addEventListener("change", async (event) => {
        const checkbox = event.target;
        const isDone = checkbox.checked;
        const response = await fetch(`/todos/${checkbox.value}/status`, {
            method: "PATCH",
            body: JSON.stringify({
                isDone,
            }),
            headers: new Headers({
                "Content-type": "application/json",
                "X-CSRF-TOKEN": csrf.value,
            }),
        });
        if (response.status === 200) {
            const text = isDone
                ? "Status has been mark as done"
                : "Status has been unmarked as done";
            toastr.success(text, "Status Update");
        }
        if (response.status >= 400) {
            toastr.error("Error", "Unknown error occured");
        }
    });
});
