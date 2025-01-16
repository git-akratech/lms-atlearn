define(['jquery', 'core/ajax', 'core/templates'], function($, Ajax, Templates) {
    return {
        init: function() {
            // Search functionality
            let searchTimeout;
            $('#searchUsers').on('input', function() {
                clearTimeout(searchTimeout);
                const searchTerm = $(this).val();
                
                searchTimeout = setTimeout(() => {
                    updateUserList({ search: searchTerm });
                }, 500);
            });

            // Sorting functionality
            $('.sortable').on('click', function() {
                const sort = $(this).data('sort');
                const currentDirection = $(this).hasClass('sorted-asc') ? 'desc' : 'asc';
                updateUserList({ sort: sort, direction: currentDirection });
            });

            function updateUserList(params = {}) {
                const currentParams = new URLSearchParams(window.location.search);
                
                // Merge current parameters with new ones
                for (let key in params) {
                    currentParams.set(key, params[key]);
                }
                
                // Reset page when sorting or searching
                if (params.sort || params.search) {
                    currentParams.set('page', 0);
                }

                window.location.search = currentParams.toString();
            }
        }
    };
});