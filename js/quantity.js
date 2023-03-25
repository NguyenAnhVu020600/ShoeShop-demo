function quantityButtons() {
    var $qtyAdd = $('.plus'),
        $qtyRemove = $('.minus'),
        $qtyInput = $('.quantity-selector');

    $qtyAdd.on('click', plusQuantity);
    $qtyRemove.on('click', minusQuantity);

    function plusQuantity() {
        var $qtyInput = $('.quantity-selector'),
            $qtyRemove = $('minus'),
            $i = $qtyInput.val();

        $i++;
        $qtyRemove.attr("disabled", !$i);
        $qtyInput.val($i);
    }

    function minusQuantity() {
        var $qtyInput = $('.quantity-selector'),
            $qtyRemove = $('minus'),
            $i = $qtyInput.val();

        if ($i >= 2) {
            $i--;
            $qtyInput.val($i);
        } else {
            $qtyRemove.attr("disabled", true);
        }
    }

    $qtyRemove.attr("disabled", !$qtyInput.val());
}

quantityButtons();