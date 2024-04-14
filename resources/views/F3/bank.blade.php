@include('f3.inc.head')
@include('f3.inc.head2')
@include('layouts.appsidebar');
<style>
    /* Styles for tables */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    /* Styles for table headings */
    th {
        background-color: #f0f0f0;
        padding: 10px;
        text-align: left;
        border-right: 50%;
    }

    /* Styles for table cells */
    td {
        padding: 10px;
        border-bottom: 1px solid #ccc;
        text-align: left;
    }

    /* Style for table footer */
    tfoot th {
        background-color: #e0e0e0;
        padding: 10px;
        text-align: left;
    }

    /* Align amount to the right */
    td.amount,
    th.amount {
        text-align: right;
    }

    /* Set border style for table elements */
    tbody,
    td,
    tfoot,
    th,
    thead,
    tr {
        border-color: inherit;
        border-style: solid;
        border-width: 1px; /* Specify the border width */
    }

    /* Left th */
    th.left {
        width: 75%; /* 75% width for the left th */
    }

    /* Right th */
    th.right {
        width: 25%; /* 25% width for the right th */
    }
</style>
<main id="main" class="main">
    {{-- <body>
        <h1>Balance Sheet</h1>
        <table>
            <thead>
                <tr>
                    <th>Assets</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Cash</td>
                    <td>{{ number_format($trytest[0]['cash'], 2) }}</td>
                </tr>
                <tr>
                    <td>Accounts Receivable</td>
                    <td>{{ number_format($trytest[0]['accountsReceivable'], 2) }}</td>
                </tr>
                <tr>
                    <td>Inventory</td>
                    <td>{{ number_format($trytest[0]['inventory'], 2) }}</td>
                </tr>
                <tr>
                    <td>Property, Plant & Equipment</td>
                    <td>{{ number_format($trytest[0]['ppe'], 2) }}</td>
                </tr>
                <tr>
                    <th>Total Assets</th>
                    <td>{{ number_format($trytest[0]['totalAssets'], 2) }}</td>
                </tr>
            </tbody>
        </table>

        <table>
            <thead>
                <tr>
                    <th>Liabilities</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Accounts Payable</td>
                    <td>{{ number_format($trytest[0]['accountsPayable'], 2) }}</td>
                </tr>
                <tr>
                    <td>Debt</td>
                    <td>{{ number_format($trytest[0]['debt'], 2) }}</td>
                </tr>
                <tr>
                    <th>Total Liabilities</th>
                    <td>{{ number_format($trytest[0]['totalLiabilities'], 2) }}</td>
                </tr>
            </tbody>
        </table>

        <table>
            <thead>
                <tr>
                    <th>Shareholder's Equity</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Equity Capital</td>
                    <td>{{ number_format($trytest[0]['equityCapital'], 2) }}</td>
                </tr>
                <tr>
                    <td>Retained Earnings</td>
                    <td>{{ number_format($trytest[0]['retainedEarnings'], 2) }}</td>
                </tr>
                <tr>
                    <th>Total Shareholder's Equity</th>
                    <td>{{ number_format($trytest[0]['totalEquity'], 2) }}</td>
                </tr>
            </tbody>
        </table>

        <table>
            <tfoot>
                <tr>
                    <th>Total Liabilities & Shareholder's Equity</th>
                    <td>{{ number_format($trytest[0]['totalLiabilitiesEquity'], 2) }}</td>
                </tr>
            </tfoot>
        </table>
    </body> --}}



    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <h5 class="card-title">Bank Reconcilation<span>| Today</span></h5>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Date of Birth</th>
                            <th>Address</th>
                            <th>Phone 1</th>
                            <th>Phone 2</th>
                            <th>Phone 3</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $record)
                        <tr>
                            <td>{{ $record['id'] }}</td>
                            <td>{{ $record['name'] }}</td>
                            <td>{{ $record['dob'] }}</td>
                            <td>{{ $record['address'] }}</td>
                            <td>{{ $record['phone1'] }}</td>
                            <td>{{ $record['phone2'] }}</td>
                            <td>{{ $record['phone3'] }}</td>
                            <td>{{ $record['email'] }}</td>
                            <td class="d-flex align-items-center justify-content-start">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{ $record['id']}}">
                                    View Details
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @foreach($data as $record)
    <tr>
        <td>
            <!-- The Modal -->
            <div class="modal fade" id="myModal{{ $record['id'] }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{ $record['id'] }}">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel{{ $record['id'] }}">Details for ID: {{ $record['id'] }}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>ID:      <strong>{{ $record['id'] }}</strong></p>
                            <p>Name:        <strong>{{ $record['name'] }}</strong></p>
                            <p>Date of Birth:       <strong>{{ $record['dob'] }}</strong></p>
                            <p>Address:     <strong>{{ $record['address'] }}</strong></p>
                            <p>Phone 1:     <strong>{{ $record['phone1'] }}</strong></p>
                            <p>Phone 2:     <strong>{{ $record['phone2'] }}</strong></p>
                            <p>Phone 3:     <strong>{{ $record['phone3'] }}</strong></p>
                            <p>Email:       <strong>{{ $record['email'] }}</strong></p>
                            <p>Routing Number:      <strong>{{ $record['routingno'] }}</strong></p>
                            <p>Account Number:      <strong>{{ $record['accountno'] }}</strong></p>
                            <p>Card:        <strong>{{ $record['card'] }}</strong></p>
                            <p>Month/Year:      <strong>{{ $record['monyear'] }}</strong></p>
                            <p>CVV:     <strong>***</p>
                        </div>
                        {{-- <div class="modal-footer">

                        </div> --}}
                    </div>
                </div>
            </div> <!--  end of modal -->
        </td>
    </tr>
    @endforeach

</main>

@include('f3.inc.foot')
