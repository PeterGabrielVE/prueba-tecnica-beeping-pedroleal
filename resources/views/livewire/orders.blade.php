
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table id="example" class="w-full text-sm text-left text-gray-500 dark:text-gray-400 table-auto">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Order Ref
                </th>
                <th scope="col" class="px-6 py-3">
                    Customer Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Total Qty
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr class="bg-black border-b">
                <td scope="row" class="dark:bg-gray-800 dark:border-gray-700">
                    {{ $order->order_ref ? $order->order_ref : null }}
                </td>
                <td class="px-6 py-4 dark:bg-gray-800 dark:border-gray-700">
                    {{ $order->customer_name ? $order->customer_name : null }}
                </td>
                <td class="px-6 py-4 dark:bg-gray-800 dark:border-gray-700">
                    {{ $order->total_qty ? $order->total_qty : null }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            // Add any customization options here
        });
    });
</script>