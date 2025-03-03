$(document).ready(function () {
    calculateTotal_edit();
    $('#package20L_edit').on('input', function () {
        let input_price_edit = parseFloat($(this).val()) || 0; // Get value and convert to number
        let price_20L_edit = parseFloat($('#price_20L_edit').val()) || 0; // Get value and convert to number
        let total_edit = input_price_edit * price_20L_edit; // Add 400
        $('#price_20L_Total_edit').val(total_edit); // Set the result
        calculateTotal_edit();
    });
    $('#package5L_edit').on('input', function () {
        let input_price_edit = parseFloat($(this).val()) || 0; // Get value and convert to number
        let price_5L_edit = parseFloat($('#price_5L_edit').val()) || 0; // Get value and convert to number
        let total_edit = input_price_edit * price_5L_edit; // Add 400
        $('#price_5L_Total_edit').val(total_edit); // Set the result
        calculateTotal_edit();
    });
    $('#package3L_edit').on('input', function () {
        let input_price_edit = parseFloat($(this).val()) || 0; // Get value and convert to number
        let price_3L_edit = parseFloat($('#price_3L_edit').val()) || 0; // Get value and convert to number
        let total_edit = input_price_edit * price_3L_edit; // Add 400
        $('#price_3L_Total_edit').val(total_edit); // Set the result
        calculateTotal_edit();
    });
    $('#package2L_edit').on('input', function () {
        let input_price_edit = parseFloat($(this).val()) || 0; // Get value and convert to number
        let price_2L_edit = parseFloat($('#price_2L_edit').val()) || 0; // Get value and convert to number
        let total_edit = input_price_edit * price_2L_edit; // Add 400
        $('#price_2L_Total_edit').val(total_edit); // Set the result
        calculateTotal_edit();
    });
    $('#package1L_edit').on('input', function () {
        let input_price_edit = parseFloat($(this).val()) || 0; // Get value and convert to number
        let price_1L_edit = parseFloat($('#price_1L_edit').val()) || 0; // Get value and convert to number
        let total_edit = input_price_edit * price_1L_edit; // Add 400
        $('#price_1L_Total_edit').val(total_edit); // Set the result
        calculateTotal_edit();
    });
    // BIG TOTAL TASKS
});
function calculateTotal_edit(){
let t20  = parseFloat($('#price_20L_Total_edit').val()) || 0;
let t5  = parseFloat($('#price_5L_Total_edit').val()) || 0;
let t3  = parseFloat($('#price_3L_Total_edit').val()) || 0;
let t2  = parseFloat($('#price_2L_Total_edit').val()) || 0;
let t1  = parseFloat($('#price_1L_Total_edit').val()) || 0;
let big_total_edit = t5 + t20 + t3 + t2 + t1;
console.log("tot is "+ big_total_edit);
$('#big_Total_edit').val(big_total_edit);
}
                   