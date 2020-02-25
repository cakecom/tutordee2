<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<form id="checkoutForm" method="POST" action="/charge">
    <input type="text" id="amount">
    <input type="hidden" name="omiseToken">
    <input type="hidden" name="omiseSource">
    <button type="submit" id="checkoutButton">Checkout</button>
</form>

<script type="text/javascript" src="https://cdn.omise.co/omise.js">
</script>

<script>
    $( document ).ready(function() {
        // var amount = $("#amount").val();
        OmiseCard.configure({
            publicKey: "OMISE_PUBLIC_KEY"
        });

        var button = document.querySelector("#checkoutButton");
        var form = document.querySelector("#checkoutForm");

        button.addEventListener("click", (event) => {
            event.preventDefault();
            var amount = $("#amount").val();
            OmiseCard.open({
                amount: amount,
                currency: "THB",
                defaultPaymentMethod: "credit_card",
                onCreateTokenSuccess: (nonce) => {
                    if (nonce.startsWith("tokn_")) {
                        form.omiseToken.value = nonce;
                    } else {
                        form.omiseSource.value = nonce;
                    }
                    ;
                    form.submit();
                }
            });
        });
    });
</script>