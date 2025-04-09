// Form validation
document.addEventListener('DOMContentLoaded', function() {
   
    
    
    
    // Dynamic table sorting
    const tables = document.querySelectorAll('table');
    tables.forEach(table => {
        const headers = table.querySelectorAll('th');
        headers.forEach(header => {
            header.addEventListener('click', () => {
                const index = Array.from(header.parentElement.children).indexOf(header);
                sortTable(table, index);
            });
        });
    });
});

function sortTable(table, column) {
    const tbody = table.querySelector('tbody');
    const rows = Array.from(tbody.querySelectorAll('tr'));
    
    rows.sort((a, b) => {
        const aValue = a.children[column].textContent;
        const bValue = b.children[column].textContent;
        
        if (!isNaN(aValue) && !isNaN(bValue)) {
            return Number(aValue) - Number(bValue);
        }
        return aValue.localeCompare(bValue);
    });
    
    rows.forEach(row => tbody.appendChild(row));
}