$(function () {
    $("#books-table").on("click", ".delete-btn", function () {
        const url = $(this).data("action");
        const name = $(this).data("name");
        deleteModal(url, {
            type: "Buku",
            name: name,
            confirmButtonText: "Ya, Hapus saja",
            cancelButtonText: `Tidak`,
            success: (res) => {
                Swal.fire({
                    icon: "success",
                    title: res.success || "Sukses!",
                    text: res.success_message || null,
                }).then(() => {
                    $("#books-table").DataTable().ajax.reload();
                });
            },
            failed: () => {
                Swal.fire({ icon: "error", title: "Gagal :(" });
            },
        });
    });

    $("#filter-btn").on("click", function () {
        $("#books-table").DataTable().ajax.reload();
    });
});
