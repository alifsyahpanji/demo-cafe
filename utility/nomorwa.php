<script>
    function nomorWa() {
        let dataNomor = document.getElementById("telepon");
        let valueNomor = dataNomor.value;
        let replaceNomor = valueNomor.replace(/[\W]/g, '');
        document.getElementById("telepon").value = replaceNomor;

        let firstDigit = String(replaceNomor)[0];
        let firstDigitNum = Number(firstDigit);

        if (firstDigit == "6") {
            let removeNumber = replaceNomor.slice(2);
            let finalNumber = "0" + removeNumber;
            document.getElementById("telepon").value = finalNumber;
        }



    }
</script>