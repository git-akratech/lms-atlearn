define(['jquery'], function($) {
    return {
        init: function() {
            let searchTimeout;
            
            // Real-time search with debounce
            $('#searchQuizzes').on('input', function() {
                clearTimeout(searchTimeout);
                const searchTerm = $(this).val();
                
                searchTimeout = setTimeout(() => {
                    const currentUrl = new URL(window.location.href);
                    currentUrl.searchParams.set('search', searchTerm);
                    currentUrl.searchParams.set('page', '0'); // Reset to first page on search
                    window.location.href = currentUrl.toString();
                }, 500);
            });

            // Sort functionality
            $('.quiz-list-header th[data-sort]').on('click', function() {
                const currentUrl = new URL(window.location.href);
                const sort = $(this).data('sort');
                const currentDirection = currentUrl.searchParams.get('direction') || 'ASC';
                const newDirection = currentDirection === 'ASC' ? 'DESC' : 'ASC';
                
                currentUrl.searchParams.set('sort', sort);
                currentUrl.searchParams.set('direction', newDirection);
                currentUrl.searchParams.set('page', '0'); // Reset to first page on sort change
                
                window.location.href = currentUrl.toString();
            });
        }
    };
});