document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const filterStatus = document.getElementById('filterStatus');
    const filterLocation = document.getElementById('filterLocation');
    // Only target cards that have searchable data (the ones in the grid)
    const cards = document.querySelectorAll('[data-slot="card"][data-search]');
    const countDisplay = document.getElementById('countDisplay');
    const totalCount = cards.length;

    function filterCards() {
        if (!searchInput || !filterStatus || !filterLocation) return;

        const searchText = searchInput.value.toLowerCase().trim();
        const statusValue = filterStatus.value;
        const locationValue = filterLocation.value;
        let visibleCount = 0;

        cards.forEach(card => {
            const searchData = card.getAttribute('data-search') || '';
            const statusData = card.getAttribute('data-status') || '';
            // Handle location data carefully as it might be empty
            const locationData = card.getAttribute('data-location') || '';

            // Check matches
            const matchesSearch = searchText === '' || searchData.includes(searchText);
            // Strict equality for filters, but allow empty value to match all
            const matchesStatus = statusValue === '' || statusData === statusValue;
            const matchesLocation = locationValue === '' || locationData === locationValue;

            if (matchesSearch && matchesStatus && matchesLocation) {
                card.classList.remove('hidden');
                visibleCount++;
            } else {
                card.classList.add('hidden');
            }
        });

        // Update counter
        if (countDisplay) {
            countDisplay.textContent = `Mostrando ${visibleCount} de ${totalCount} unidades`;
        }
    }

    // Event listeners
    if (searchInput) searchInput.addEventListener('input', filterCards);
    if (filterStatus) filterStatus.addEventListener('change', filterCards);
    if (filterLocation) filterLocation.addEventListener('change', filterCards);
});
