let copy_message = document.querySelector(".copy-message");
let copy_button = document.querySelector(".copy-button");
let copy_text = document.getElementById("copy-text");
let parent_element = copy_message.parentElement;

copy_button.addEventListener("click", function() {
    // Copy the text to the clipboard
    navigator.clipboard.writeText(copy_text.innerHTML)
    .then(() => {
        // Show a "Copied to clipboard" message for 2 seconds
        const message = document.createElement("div");
        message.innerHTML = "Copied to clipboard";
        message.style.color = "green"; // Optional: style the message
        parent_element.appendChild(message);
        setTimeout(() => {
            parent_element.removeChild(message);
        }, 3000);
    })
    .catch(error => {
        console.error("Failed to copy text: ", error);
    });
});
