<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Orders Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 2px;
            font-size: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h5>Orders Report</h5>
<table>
    <thead>
    <tr>
        <th>S/N</th>
        <th>Order Date</th>
        <th>Customer</th>
        <th>Item</th>
        <th>Quantity</th>
        <th>Size</th>
        <th>Paper</th>
        <th>Plate</th>
        <th>Printing</th>
        <th>Lamination</th>
        <th>Binding</th>
        <th>Delivery</th>
        <th>Amount</th>
        <th>By</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($records as $index => $record)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ \Carbon\Carbon::parse($record->order_date)->format('Y-m-d') }}</td>
            <td>{{ $record->customer->name }}</td>
            <td>{{ $record->stockItem->name }}</td>
            <td>{{ $record->quantity }}</td>
            <td>{{ $record->size->name }}</td>
            <td>{{ $record->paperVendor->name }}</td>
            <td>{{ $record->plateVendor->name }}</td>
            <td>{{ $record->printingVendor->name }}</td>
            <td>{{ $record->laminationVendor->name }}</td>
            <td>{{ $record->bindingVendor->name }}</td>
            <td>{{ \Carbon\Carbon::parse($record->delivery_date)->format('Y-m-d') }}</td>
            <td>{{ $record->amount }}</td>
            <td>{{ $record->user->name }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
