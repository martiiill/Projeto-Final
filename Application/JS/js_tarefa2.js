/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {

    $('.addTarefa').prop('disabled', true);

    $('#data').keyup(function () {
        if ($(this).val().length !== 0) {
            $('.addTarefa').prop('disabled', false);
        } else {
            $('.addTarefa').prop('disabled', true);
        }
    });

    $('#descricao').keyup(function () {
        if ($(this).val().length !== 0) {
            $('.addTarefa').prop('disabled', false);
        } else {
            $('.addTarefa').prop('disabled', true);
        }
    });

    $(".addTarefa").click(function () {
        document.getElementById('formularioNovaTarefa2').style.display = 'block';
        document.getElementById('addTarefa').style.display = 'none';
    });
});

$(document).ready(function () {
    $("#tipoTarefa2").change(function () {
        $(this).find("option:selected").each(function () {
            var optionValue = $(this).attr("value");
            if (optionValue === "rega2") {
                $("#formRega2").show();
                $("#formGeral2").hide();
                $("#formSulfatacao2").hide();
                $("#formTratamentoDoenca2").hide();
                $("#formDoenca2").hide();
            } else {
                $("#formRega2").hide();
            }

            if (optionValue === "poda2") {
                $("#formPoda2").show();
                $("#formGeral2").hide();
                $("#formSulfatacao2").hide();
                $("#formTratamentoDoenca2").hide();
                $("#formDoenca2").hide();
            } else {
                $("#formPoda2").hide();
            }

            if (optionValue === "adubo2") {
                $("#formAdubo2").show();
                $("#formGeral2").hide();
                $("#formSulfatacao2").hide();
                $("#formTratamentoDoenca").hide();
                $("#formDoenca2").hide();
            } else {
                $("#formAdubo2").hide();
            }

            if (optionValue === "trata2") {
                $("#formTratamentos2").show();
                $("#formGeral2").hide();
                $("#formSulfatacao2").hide();
                $("#formTratamentoDoenca2").hide();
                $("#formDoenca2").hide();
            } else {
                $("#formTratamentos2").hide();
            }
        });

    });

    $("#tipoRega2").change(function () {
        $(this).find("option:selected").each(function () {
            var optionValue = $(this).attr("value");
            if (optionValue) {
                $("#formGeral2").show();
            } else {
                $("#formGeral2").hide();
            }
        });
    });

    $("#tipoPoda2").change(function () {
        $(this).find("option:selected").each(function () {
            var optionValue = $(this).attr("value");
            if (optionValue) {
                $("#formGeral2").show();
            } else {
                $("#formGeral2").hide();
            }
        });
    });

    $("#tipoAdubo2").change(function () {
        $(this).find("option:selected").each(function () {
            var optionValue = $(this).attr("value");
            if (optionValue) {
                $("#formGeral2").show();
            } else {
                $("#formGeral2").hide();
            }
        });
    });

    $("#tipoTratamento2").change(function () {
        $(this).find("option:selected").each(function () {
            var optionValue = $(this).attr("value");
            if (optionValue === "doenca2") {
                $("#formDoenca2").show();
            } else {
                $("#formSulfatacao2").hide();
            }
        });
    });

    $("#tipoDoenca2").change(function () {
        $(this).find("option:selected").each(function () {
            var optionValue = $(this).attr("value");
            if (optionValue) {
                $("#formTratamentoDoenca2").show();
            } else {
                $("#formTratamentoDoenca2").hide();
            }
        });
    });
    }).change();