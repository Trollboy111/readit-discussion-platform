document.addEventListener('DOMContentLoaded', function () {
    const filterSelect = document.getElementById('filter_posts_topic');
    if (filterSelect) {
        // Listen for changes in the select dropdown
        filterSelect.addEventListener('change', function () {
            const post_topic = this.value || this.options[this.selectedIndex].value; // Get selected value
            // Redirect with the selected topic as a query parameter
            window.location.href = window.location.href.split('?')[0] + '?topic=' + encodeURIComponent(post_topic);
        });
    }

    // Handle form submission (only for delete forms)
    document.body.addEventListener('submit', function (event) {
        // Check if the form has the 'delete-form' class (only delete forms)
        if (event.target.closest('form') && event.target.closest('form').classList.contains('delete-form')) {
            if (confirm("Are you sure you want to delete this?")) {
                // If confirmed, allow form submission
                event.target.submit();
            } else {
                // Prevent form submission if not confirmed
                event.preventDefault();
            }
        }
    });
});
