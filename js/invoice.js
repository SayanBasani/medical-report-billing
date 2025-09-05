$(document).ready(function () {
  // Select/Deselect All
  $(document).on('click', '#checkAll', function () {
    $(".itemRow").prop("checked", this.checked);
  });

  $(document).on('click', '.itemRow', function () {
    $('#checkAll').prop('checked', $('.itemRow:checked').length === $('.itemRow').length);
  });

  // Add Row
  let count = $(".itemRow").length;
  $(document).on('click', '#addRows', function () {
    count++;
    let htmlRows = `
      <tr>
        <td><input class="itemRow" type="checkbox"></td>
        <td><input type="text" name="productCode[]" id="productCode_${count}" class="form-control"></td>
        <td><input type="text" name="productName[]" id="productName_${count}" class="form-control"></td>
        <td><input type="number" name="quantity[]" id="quantity_${count}" class="form-control quantity"></td>
        <td><input type="number" name="price[]" id="price_${count}" class="form-control price"></td>
        <td><input type="number" name="total[]" id="total_${count}" class="form-control total" readonly></td>
      </tr>`;
    $('#invoiceItem tbody').append(htmlRows);
  });

  // Remove Row
  $(document).on('click', '#removeRows', function () {
    $(".itemRow:checked").each(function () {
      $(this).closest('tr').remove();
    });
    $('#checkAll').prop('checked', false);
    calculateTotal();
  });

  // Recalculate on input change (better than blur)
  $(document).on('input', '.quantity, .price', function () {
    calculateTotal();
  });

  function calculateTotal() {
    let totalAmount = 0;
    $('#invoiceItem tbody tr').each(function (index, row) {
      const qty = parseFloat($(row).find('.quantity').val()) || 0;
      const price = parseFloat($(row).find('.price').val()) || 0;
      const total = qty * price;
      $(row).find('.total').val(total.toFixed(2));
      totalAmount += total;
    });

    $('#subTotal').val(totalAmount.toFixed(2));

    // Optional Tax + Paid + Due section
    let taxRate = parseFloat($('#taxRate').val()) || 0;
    let taxAmount = (totalAmount * taxRate) / 100;
    $('#taxAmount').val(taxAmount.toFixed(2));
    let totalAftertax = totalAmount + taxAmount;
    $('#totalAftertax').val(totalAftertax.toFixed(2));

    let amountPaid = parseFloat($('#amountPaid').val()) || 0;
    $('#amountDue').val((totalAftertax - amountPaid).toFixed(2));
  }
  

  // Optional handlers
  $(document).on('input', '#taxRate, #amountPaid', function () {
    calculateTotal();
  });

  // Delete invoice via AJAX
  $(document).on('click', '.deleteInvoice', function () {
    const id = $(this).attr("id");
    if (confirm("Are you sure you want to remove this?")) {
      $.ajax({
        url: "action.php",
        method: "POST",
        dataType: "json",
        data: { id: id, action: 'delete_invoice' },
        success: function (response) {
          if (response.status == 1) {
            $('#' + id).closest("tr").remove();
          }
        }
      });
    }
  });
});
