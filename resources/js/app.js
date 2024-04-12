import './bootstrap';
import 'preline'

document.addEventListener("DOMContentLoaded", function() {
    // Get reference to input field and output paragraph
    const inputField = document.getElementById('tags');

    if (inputField) { // Check if the element exists
        const output = document.getElementById('output');
        let tags = [];

        // Add event listener for input event
        inputField.addEventListener('keypress', function(event) {
            // Check if "Space" key is pressed
            if (event.key === ' ' && inputField.value.trim() !== '') {
                // Create a new tag in the output with the content of the input field
                const tagContent = inputField.value.trim();
                const newTag = document.createElement('span');
                newTag.textContent = tagContent;
                newTag.classList.add('py-1', 'px-2', 'text-text', 'open-sans-medium', 'text-xs', 'bg-secondary', 'rounded-full');
                output.appendChild(newTag);

                // Add the tag value to the array
                tags.push(tagContent);

                // Update the hidden input field with the new tags array
                document.getElementById('tagsArray').value = JSON.stringify(tags);

                // Clear the input field
                inputField.value = '';
            }
        });
    }

    // view the space tasks when click on the space card
        // Get a reference to the space card element
        let card = document.getElementById("space-card");

        if (card) { // Check if the element exists
            // Attach click event listener to the card
            card.addEventListener("click", function() {
                // Get the user ID and space ID from the data-* attributes
                let userId = card.dataset.userId;
                let spaceId = card.dataset.spaceId;

                console.log("Redirecting to URL:", `/dashboard/${userId}/${spaceId}`);

                // Redirect to the URL
                window.location.href = `/dashboard/${userId}/${spaceId}`;
            });
        }

        // Get a reference to the dropdown menu
        let dropdown = document.getElementById("dropdown");

        if (dropdown) { // Check if the element exists
            // Stop propagation of click event on the dropdown menu
            dropdown.addEventListener("click", function(event) {
                event.stopPropagation();
            });
        }
});
