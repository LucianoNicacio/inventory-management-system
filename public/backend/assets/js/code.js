document.addEventListener('DOMContentLoaded', () => {
    // Use event delegation on document
    document.addEventListener('click', (e) => {
        // Check if clicked element has class 'delete-btn'
        if (e.target.classList.contains('delete-btn')) {
            e.preventDefault();
            const link = e.target.getAttribute('href');

            Swal.fire({
                title: 'Are you sure?',
                text: "Delete This Data?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link;
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    );
                }
            });
        }
    });
});