<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Order Invoice</title>
    <style>
        @page {
            size: A4;
            margin: 20mm;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container {
            width: 100%;
            height: 100%;
            padding: 20px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .invoice-header h1 {
            margin: 0;
        }
        .section {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 20px;
            margin-bottom: 20px;
        }
        .field {
            padding: 10px;
            border: 1px solid #dddddd;
            border-radius: 4px;
            background-color: #f9f9f9;
        }
        .field label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .field p {
            margin: 0;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="invoice-header">
        <h4>Order Invoice</h4>
        <p>Design House<br>Phone: +919828292601</p>
    </div>

    <div class="section">
        <div class="field">
            <label>Order Date</label>
            <p>{{ \Carbon\Carbon::parse($record->order_date)->format('Y-m-d') }}</p>
        </div>
        <div class="field">
            <label>Customer</label>
            <p>{{ $record->customer->name }}</p>
        </div>
        <div class="field">
            <label>Stock Item</label>
            <p>{{ $record->stockItem->name }}</p>
        </div>
        <div class="field">
            <label>Quantity</label>
            <p>{{ $record->quantity }}</p>
        </div>
        <div class="field">
            <label>Size</label>
            <p>{{ $record->size->name }}</p>
        </div>
        <div class="field">
            <label>Paper</label>
            <p>{{ $record->paperVendor->name }}</p>
        </div>
        <div class="field">
            <label>Plate</label>
            <p>{{ $record->plateVendor->name }}</p>
        </div>
        <div class="field">
            <label>Printing</label>
            <p>{{ $record->printingVendor->name }}</p>
        </div>
        <div class="field">
            <label>Lamination</label>
            <p>{{ $record->laminationVendor->name }}</p>
        </div>
        <div class="field">
            <label>Binding</label>
            <p>{{ $record->bindingVendor->name }}</p>
        </div>
        <div class="field">
            <label>Delivery Date</label>
            <p>{{ \Carbon\Carbon::parse($record->delivery_date)->format('Y-m-d') }}</p>
        </div>
        <div class="field">
            <label>Amount</label>
            <p>{{ $record->amount }}</p>
        </div>
    </div>
</div>
</body>
</html>
