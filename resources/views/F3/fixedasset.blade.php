@include('f3.inc.head')
@include('f3.inc.head2')
@include('layouts.appsidebar');
<style>
/* Styles for the balance sheet title */
h1 {
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
}

/* Styles for the card container */
.card {
    border: 1px solid #ccc;
    border-radius: 8px;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Styles for the card header */
.card-header {
    background-color: #f0f0f0;
    padding: 10px 20px;
    border-bottom: 1px solid #ccc;
    border-radius: 8px 8px 0 0;
}

/* Styles for the card title */
.card-title {
    font-size: 20px;
    font-weight: bold;
    color: #333;
}

/* Styles for the table container */
table {
    width: 100%;
    border-collapse: collapse;
}

/* Styles for the table headings */
th {
    padding: 10px;
    text-align: left;
    font-weight: bold;
    border-bottom: 2px solid #ddd;
}

/* Styles for the table cells */
td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

/* Hover effect for table rows */
tr:hover {
    background-color: #f5f5f5;
}

/* Set width for amount column */
.amount {
    text-align: right;
}

/* Styles for responsiveness */
@media (max-width: 768px) {
    .card {
        padding: 10px;
    }

    h1 {
        font-size: 20px;
    }

    table {
        font-size: 14px;
    }
}


</style>
<main id="main" class="main">
    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <body>
                <h1>Balance Sheet</h1>
                <table>
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($random_data as $category => $amount)
                        <tr>
                            <td>{{ ucfirst(str_replace('_', ' ', $category)) }}</td>
                            <td>{{ number_format($amount, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </body>


        </div>
    </div>
</main>
@include('f3.inc.foot')

