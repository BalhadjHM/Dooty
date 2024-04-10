import './bootstrap';
import 'preline'



// Get reference to input field and output paragraph
const inputField = document.getElementById('tags');
const output = document.getElementById('output');
let tags = [];

// Add event listener for input event
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

        // Clear the input field
        inputField.value = '';
    }
});
