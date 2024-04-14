import './bootstrap';
import 'preline'

document.addEventListener("DOMContentLoaded", function() {

    // view tags in the input field
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
        // Get a reference to all space card elements
        let cards = document.querySelectorAll("[data-space-id]");

        // Loop through all cards
        cards.forEach(card => {
            // Attach click event listener to the card
            card.addEventListener("click", function() {
                // Get the user ID and space ID from the data-* attributes
                let userId = card.dataset.userId;
                let spaceId = card.dataset.spaceId;

                console.log("Redirecting to URL:", `/dashboard/${userId}/${spaceId}`);

                // Redirect to the URL
                window.location.href = `/dashboard/${userId}/${spaceId}`;
            });
        });

    // Check and uncheck tasks when click on the task card
        // Get a reference to the container that holds all tasks
        let taskContainer = document.getElementById('taskContainer');

        // Attach click event listener to the container
        taskContainer.addEventListener('click', function(event) {
            // Check if the clicked element or its parent is a task card
            let task = event.target.closest("[data-task-id]");
            if (task) {
                // Get the task ID, user ID, space ID, and status from the data-* attributes
                const taskId = task.getAttribute('data-task-id');
                const userId = task.getAttribute('data-user-id');
                const spaceId = task.getAttribute('data-space-id');
                let status = task.getAttribute('data-task-status');
                let parent = task.parentElement;
                let url = '';

                // Depending on the status of the task, call the appropriate API endpoint
                if (status !== '0') {
                    parent.classList.add('checked');
                    url = `/dashboard/${userId}/${spaceId}/check/${taskId}`;
                } else {
                    parent.classList.remove('checked');
                    url = `/dashboard/${userId}/${spaceId}/uncheck/${taskId}`;
                }

                // Make a PUT request to the server
                fetch(url, {
                    method: 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // Handle the response data here
                    console.log(data);
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
            }
        });

        // Get a reference to the dropdown menu and the star and unstar buttons
        document.querySelectorAll('.hs-dropdown-menu, .hs-dropdown-toggle, .hs-dropdown, .hs-dropdown-btn, .star, .unstar').forEach(function(element) {
            element.addEventListener('click', function(event) {
                event.stopPropagation();
            });
        });
});
