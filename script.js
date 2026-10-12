document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("userForm");

    form.addEventListener("submit", function(event) {
        // Get the values and remove leading/trailing spaces
        const name = document.getElementById("name").value.trim();
        const address = document.getElementById("address").value.trim();
        const email = document.getElementById("email").value.trim();

        // Prevent submission if fields only contain spaces
        if (name === "" || address === "" || email === "") {
            alert("Fields cannot be empty or contain only spaces.");
            event.preventDefault(); // Stops the form from submitting
            return;
        }

        // Ask for confirmation before submitting to the database
        const confirmSave = confirm("Are you sure you want to save this data?");
        
        if (!confirmSave) {
            event.preventDefault(); // Stops the form if user clicks 'Cancel'
        }
    });
});