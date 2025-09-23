$(document).ready(function () {
    $("#estabTable").DataTable({
        ordering: false,
        searching: true,
    });
    var icsTable = $("#icsTable").DataTable({
        ordering: false,
        searching: true,
    });
    var rpcppeTable = $("#rpcppeTable").DataTable({
        ordering: false,
        searching: true,
    });

    $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
        if (
            settings.nTable.id !== "icsTable" &&
            settings.nTable.id !== "rpcppeTable"
        ) {
            return true;
        }

        var selectedOffice = $(".selectEstab").val() || "";
        var selectedPpe = $(".selectPPE").val() || "";
        var ColEstabPPE = data[3] || "";

        if (
            (selectedOffice === "" || ColEstabPPE.includes(selectedOffice)) &&
            (selectedPpe === "" || ColEstabPPE.includes(selectedPpe))
        ) {
            return true;
        }
        return false;
    });

    $(".selectEstab, .selectPPE").on("change", function () {
        icsTable.draw();
        rpcppeTable.draw();
    });
});
