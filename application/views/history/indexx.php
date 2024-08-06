<div class="container" style="margin-top: 30px;">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable" style="border-radius: 12px; box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);">
                <div class="card-content">
                    <div class="row">
                        <div class="col s12">
                            <span class="card-title blue-text text-darken-3" style="font-size: 2.5em; text-align: center; font-weight: bold;">Transaction History</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m6 l4">
                            <div class="input-field">
                                <input id="search" type="text" class="validate">
                                <label for="search">Search Transactions</label>
                            </div>
                        </div>
                        <div class="col s12 m6 l4">
                            <div class="input-field">
                                <select id="status-filter">
                                    <option value="" disabled selected>Filter by Status</option>
                                    <option value="completed">Completed</option>
                                    <option value="pending">Pending</option>
                                    <option value="in progress">In Progress</option>
                                </select>
                                <label>Transaction Status</label>
                            </div>
                        </div>
                        <div class="col s12 l4">
                            <div class="input-field">
                                <input type="date" id="date-picker" class="datepicker">
                                <label for="date-picker">Select Date</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="card hoverable" style="border-radius: 12px; box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);">
                                <div class="card-content">
                                    <!-- Table -->
                                    <table class="striped responsive-table highlight">
                                        <thead>
                                            <tr>
                                                <th class="left-radius">Date</th>
                                                <th>Transaction ID</th>
                                                <th>Description</th>
                                                <th>Amount</th>
                                                <th class="right-radius">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>2024-08-01</td>
                                                <td>#00123</td>
                                                <td>Purchase of Office Supplies</td>
                                                <td>$120.00</td>
                                                <td class="status-cell">
                                                    <div class="status-badge green">Completed</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2024-08-02</td>
                                                <td>#00124</td>
                                                <td>Payment for Invoice</td>
                                                <td>$200.00</td>
                                                <td class="status-cell">
                                                    <div class="status-badge red">Pending</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2024-08-03</td>
                                                <td>#00125</td>
                                                <td>Refund for Overpayment</td>
                                                <td>$50.00</td>
                                                <td class="status-cell">
                                                    <div class="status-badge orange">In Progress</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2024-08-04</td>
                                                <td>#00126</td>
                                                <td>Purchase of Software License</td>
                                                <td>$300.00</td>
                                                <td class="status-cell">
                                                    <div class="status-badge green">Completed</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2024-08-05</td>
                                                <td>#00127</td>
                                                <td>Payment for Consulting Services</td>
                                                <td>$150.00</td>
                                                <td class="status-cell">
                                                    <div class="status-badge green">Completed</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2024-08-06</td>
                                                <td>#00128</td>
                                                <td>Purchase of Training Materials</td>
                                                <td>$80.00</td>
                                                <td class="status-cell">
                                                    <div class="status-badge orange">In Progress</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2024-08-07</td>
                                                <td>#00129</td>
                                                <td>Payment for Maintenance Services</td>
                                                <td>$220.00</td>
                                                <td class="status-cell">
                                                    <div class="status-badge red">Pending</div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Pagination -->
                    <div class="row">
                        <div class="col s12">
                            <ul class="pagination center-align">
                                <li class="disabled"><a href="#"><i class="material-icons">chevron_left</i></a></li>
                                <li class="waves-effect"><a href="#">1</a></li>
                                <li class="waves-effect"><a href="#">2</a></li>
                                <li class="waves-effect"><a href="#">3</a></li>
                                <li class="waves-effect"><a href="#">4</a></li>
                                <li class="waves-effect"><a href="#"><i class="material-icons">chevron_right</i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card-title {
        font-weight: bold;
        color: #0d47a1;
        /* Darker blue */
    }

    .card-content {
        padding: 24px;
    }

    .card {
        margin-top: 20px;
        border-radius: 12px;
    }

    .hoverable {
        transition: box-shadow 0.3s ease;
    }

    .hoverable:hover {
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #0d47a1;
        /* Dark blue */
        color: white;
    }

    .left-radius {
        border-radius: 8px 0 0 0;
    }

    .right-radius {
        border-radius: 0 8px 0 0;
    }

    tbody tr:nth-child(even) {
        background-color: #e0e0e0;
    }

    tbody tr:hover {
        background-color: #b2ebf2;
        /* Light cyan */
    }

    .input-field {
        margin-bottom: 20px;
    }

    .pagination {
        margin-top: 20px;
        display: flex;
        justify-content: center;
    }

    .pagination li {
        margin: 0 4px;
    }

    .pagination a {
        border-radius: 20px;
        padding: 8px 16px;
        font-size: 14px;
        color: #0d47a1;
    }

    .pagination .active a {
        background-color: #0d47a1;
        /* Dark blue */
        color: white;
        border-radius: 20px;
    }

    .pagination .waves-effect a {
        background-color: #bbdefb;
        /* Light blue */
        border-radius: 20px;
    }

    .status-cell {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
    }

    .status-badge {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 3px 12px;
        color: white;
        font-size: 0.9em;
        text-align: center;
        border-radius: 12px;
        width: 40%;
    }

    .status-badge.green {
        background-color: #388e3c;
        /* Green */
    }

    .status-badge.red {
        background-color: #d32f2f;
        /* Red */
    }

    .status-badge.orange {
        background-color: #f57c00;
        /* Orange */
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('search');
        const statusFilter = document.getElementById('status-filter');
        const datePicker = document.getElementById('date-picker');
        const table = document.querySelector('table tbody');
        const rows = table.querySelectorAll('tr');

        // Function to format date from "YYYY-MM-DD" to "DD Month, YYYY"
        function formatDate(dateString) {
            const options = {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            };
            const date = new Date(dateString);
            return date.toLocaleDateString('en-US', options);
        }

        // Function to filter table rows
        function filterTable() {
            const searchText = searchInput.value.toLowerCase();
            const selectedStatus = statusFilter.value;
            const selectedDate = datePicker.value;

            rows.forEach(row => {
                const cells = row.querySelectorAll('td');
                const date = formatDate(cells[0].textContent.trim()); // Format the date cell
                const status = cells[4].querySelector('.status-badge').textContent.toLowerCase();
                const description = cells[2].textContent.toLowerCase();

                const matchesSearch = description.includes(searchText);
                const matchesStatus = selectedStatus ? status.includes(selectedStatus.toLowerCase()) : true;
                const matchesDate = selectedDate ? date === formatDate(selectedDate) : true;

                if (matchesSearch && matchesStatus && matchesDate) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        // Event listeners for filter inputs
        searchInput.addEventListener('input', filterTable);
        statusFilter.addEventListener('change', filterTable);
        datePicker.addEventListener('change', filterTable);

        // Initialize date picker (assuming you are using a datepicker library like Materialize)
        const elems = document.querySelectorAll('.datepicker');
        M.Datepicker.init(elems, {
            format: 'yyyy-mm-dd',
            onSelect: function() {
                // Call filter function when a date is selected
                filterTable();
            }
        });
    });
</script>