document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');

    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        const formData = new FormData(form);
        try {
            const response = await fetch('upload.php', {
                method: 'POST',
                body: formData
            });
            if (response.ok) {
                alert('Profile image uploaded successfully');
                window.location.reload(); // Reload the page after successful upload
            } else {
                console.error('Failed to upload profile image');
            }
        } catch (error) {
            console.error('Error uploading profile image:', error);
        }
    });
});
