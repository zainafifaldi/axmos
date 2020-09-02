<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Axmos Project | Test Online Store Race Condition</title>
  </head>

  <body>
    <script type="text/javascript" src="{{ asset('vendor/jquery/jquery-3.4.1.min.js') }}"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#button-test').click(function(){
          var productID = $('#input-product-id').val(),
              quantity = $('#input-quantity').val();

          $.ajax({
            type: "POST",
            url: '{{ URL::to("api/online-stores/orders") }}',
            data: {
              user_id: 1,
              product_id: productID,
              quantity: quantity
            }
          });

          $.ajax({
            type: "POST",
            url: '{{ env('APP_URL') }}:8001/api/online-stores/orders',
            data: {
              user_id: 1,
              product_id: productID,
              quantity: quantity
            }
          });
        });
      });
    </script>

    <input id="input-product-id" placeholder="Product ID" />
    <input id="input-quantity" placeholder="Quantity" />
    <button type="button" id="button-test">Test Now</button>

    <ol>To use this, follow the instructions:
      <li>Duplicate axmos directory to new service (called the second axmos)</li>
      <li>Set the second axmos port to 8001</li>
      <li>Run both axmos service (first and second)</li>
      <li>Check initial stock on database online_store_products table</li>
      <li>Check total of records on online_store_orders table</li>
      <li>Hit button "Test Now" with controlled value (eg: fill quantity with '2' if stock left is 2)</li>
      <li>Good impact will add just one record on online_store_orders table</li>
      <li>Bad impact will add two records on online_store_orders table</li>
    </ol>
    <p>Notes: See app/Services/OnlineStore/Create.php:38 on `reduce_quantity()` to reproduce bad impact.</p>
  </body>
</html>
