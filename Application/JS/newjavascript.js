$(document).ready(function () {
    $("#tipoTarefa").change(function () {
        $(this).find("option:selected").each(function () {
            var optionValue = $(this).attr("value");
            if (optionValue === "rega") {
                $("#formRega").show();
                $("#formGeral").hide();
                $("#formSulfatacao").hide();
                $("#formTratamentoDoenca").hide();
                $("#formDoenca").hide();
            } else {
                $("#formRega").hide();
            }

            if (optionValue === "poda") {
                $("#formPoda").show();
                $("#formGeral").hide();
                $("#formSulfatacao").hide();
                $("#formTratamentoDoenca").hide();
                $("#formDoenca").hide();
            } else {
                $("#formPoda").hide();
            }

            if (optionValue === "adubo") {
                $("#formAdubo").show();
                $("#formGeral").hide();
                $("#formSulfatacao").hide();
                $("#formTratamentoDoenca").hide();
                $("#formDoenca").hide();
            } else {
                $("#formAdubo").hide();
            }

            if (optionValue === "trata") {
                $("#formTratamentos").show();
                $("#formGeral").hide();
                $("#formSulfatacao").hide();
                $("#formTratamentoDoenca").hide();
                $("#formDoenca").hide();
            } else {
                $("#formTratamentos").hide();
            }

            if (optionValue === "Vindima") {
                $("#formGeral").show();
            }
        });
    });

    $("#tipoRega").change(function () {
        $(this).find("option:selected").each(function () {
            var optionValue = $(this).attr("value");
            if (optionValue) {
                $("#formGeral").show();
            } else {
                $("#formGeral").hide();
            }
        });
    });

    $("#tipoPoda").change(function () {
        $(this).find("option:selected").each(function () {
            var optionValue = $(this).attr("value");
            if (optionValue) {
                $("#formGeral").show();
            } else {
                $("#formGeral").hide();
            }
        });
    });

    $("#tipoAdubo").change(function () {
        $(this).find("option:selected").each(function () {
            var optionValue = $(this).attr("value");
            if (optionValue) {
                $("#formGeral").show();
            } else {
                $("#formGeral").hide();
            }
        });
    });

    $("#tipoTratamento").change(function () {
        $(this).find("option:selected").each(function () {
            var optionValue = $(this).attr("value");
            if (optionValue === "doenca") {
                $("#formDoenca").show();
            } else {
                $("#formSulfatacao").hide();
            }
        });
    });

    $("#tipoDoenca").change(function () {
        $(this).find("option:selected").each(function () {
            var optionValue = $(this).attr("value");
            if (optionValue) {
                $("#formTratamentoDoenca").show();
            } else {
                $("#formTratamentoDoenca").hide();
            }
        });
    });
}).change();